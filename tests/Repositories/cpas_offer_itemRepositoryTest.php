<?php namespace Tests\Repositories;

use App\Models\cpas_offer_item;
use App\Repositories\cpas_offer_itemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cpas_offer_itemRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cpas_offer_itemRepository
     */
    protected $cpasOfferItemRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cpasOfferItemRepo = \App::make(cpas_offer_itemRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cpas_offer_item()
    {
        $cpasOfferItem = cpas_offer_item::factory()->make()->toArray();

        $createdcpas_offer_item = $this->cpasOfferItemRepo->create($cpasOfferItem);

        $createdcpas_offer_item = $createdcpas_offer_item->toArray();
        $this->assertArrayHasKey('id', $createdcpas_offer_item);
        $this->assertNotNull($createdcpas_offer_item['id'], 'Created cpas_offer_item must have id specified');
        $this->assertNotNull(cpas_offer_item::find($createdcpas_offer_item['id']), 'cpas_offer_item with given id must be in DB');
        $this->assertModelData($cpasOfferItem, $createdcpas_offer_item);
    }

    /**
     * @test read
     */
    public function test_read_cpas_offer_item()
    {
        $cpasOfferItem = cpas_offer_item::factory()->create();

        $dbcpas_offer_item = $this->cpasOfferItemRepo->find($cpasOfferItem->id);

        $dbcpas_offer_item = $dbcpas_offer_item->toArray();
        $this->assertModelData($cpasOfferItem->toArray(), $dbcpas_offer_item);
    }

    /**
     * @test update
     */
    public function test_update_cpas_offer_item()
    {
        $cpasOfferItem = cpas_offer_item::factory()->create();
        $fakecpas_offer_item = cpas_offer_item::factory()->make()->toArray();

        $updatedcpas_offer_item = $this->cpasOfferItemRepo->update($fakecpas_offer_item, $cpasOfferItem->id);

        $this->assertModelData($fakecpas_offer_item, $updatedcpas_offer_item->toArray());
        $dbcpas_offer_item = $this->cpasOfferItemRepo->find($cpasOfferItem->id);
        $this->assertModelData($fakecpas_offer_item, $dbcpas_offer_item->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cpas_offer_item()
    {
        $cpasOfferItem = cpas_offer_item::factory()->create();

        $resp = $this->cpasOfferItemRepo->delete($cpasOfferItem->id);

        $this->assertTrue($resp);
        $this->assertNull(cpas_offer_item::find($cpasOfferItem->id), 'cpas_offer_item should not exist in DB');
    }
}
