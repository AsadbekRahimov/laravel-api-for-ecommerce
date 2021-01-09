<?php namespace Tests\Repositories;

use App\Models\cpas_stream_item;
use App\Repositories\cpas_stream_itemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cpas_stream_itemRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cpas_stream_itemRepository
     */
    protected $cpasStreamItemRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cpasStreamItemRepo = \App::make(cpas_stream_itemRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cpas_stream_item()
    {
        $cpasStreamItem = cpas_stream_item::factory()->make()->toArray();

        $createdcpas_stream_item = $this->cpasStreamItemRepo->create($cpasStreamItem);

        $createdcpas_stream_item = $createdcpas_stream_item->toArray();
        $this->assertArrayHasKey('id', $createdcpas_stream_item);
        $this->assertNotNull($createdcpas_stream_item['id'], 'Created cpas_stream_item must have id specified');
        $this->assertNotNull(cpas_stream_item::find($createdcpas_stream_item['id']), 'cpas_stream_item with given id must be in DB');
        $this->assertModelData($cpasStreamItem, $createdcpas_stream_item);
    }

    /**
     * @test read
     */
    public function test_read_cpas_stream_item()
    {
        $cpasStreamItem = cpas_stream_item::factory()->create();

        $dbcpas_stream_item = $this->cpasStreamItemRepo->find($cpasStreamItem->id);

        $dbcpas_stream_item = $dbcpas_stream_item->toArray();
        $this->assertModelData($cpasStreamItem->toArray(), $dbcpas_stream_item);
    }

    /**
     * @test update
     */
    public function test_update_cpas_stream_item()
    {
        $cpasStreamItem = cpas_stream_item::factory()->create();
        $fakecpas_stream_item = cpas_stream_item::factory()->make()->toArray();

        $updatedcpas_stream_item = $this->cpasStreamItemRepo->update($fakecpas_stream_item, $cpasStreamItem->id);

        $this->assertModelData($fakecpas_stream_item, $updatedcpas_stream_item->toArray());
        $dbcpas_stream_item = $this->cpasStreamItemRepo->find($cpasStreamItem->id);
        $this->assertModelData($fakecpas_stream_item, $dbcpas_stream_item->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cpas_stream_item()
    {
        $cpasStreamItem = cpas_stream_item::factory()->create();

        $resp = $this->cpasStreamItemRepo->delete($cpasStreamItem->id);

        $this->assertTrue($resp);
        $this->assertNull(cpas_stream_item::find($cpasStreamItem->id), 'cpas_stream_item should not exist in DB');
    }
}
