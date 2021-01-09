<?php namespace Tests\Repositories;

use App\Models\cpas_stream;
use App\Repositories\cpas_streamRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cpas_streamRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cpas_streamRepository
     */
    protected $cpasStreamRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cpasStreamRepo = \App::make(cpas_streamRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cpas_stream()
    {
        $cpasStream = cpas_stream::factory()->make()->toArray();

        $createdcpas_stream = $this->cpasStreamRepo->create($cpasStream);

        $createdcpas_stream = $createdcpas_stream->toArray();
        $this->assertArrayHasKey('id', $createdcpas_stream);
        $this->assertNotNull($createdcpas_stream['id'], 'Created cpas_stream must have id specified');
        $this->assertNotNull(cpas_stream::find($createdcpas_stream['id']), 'cpas_stream with given id must be in DB');
        $this->assertModelData($cpasStream, $createdcpas_stream);
    }

    /**
     * @test read
     */
    public function test_read_cpas_stream()
    {
        $cpasStream = cpas_stream::factory()->create();

        $dbcpas_stream = $this->cpasStreamRepo->find($cpasStream->id);

        $dbcpas_stream = $dbcpas_stream->toArray();
        $this->assertModelData($cpasStream->toArray(), $dbcpas_stream);
    }

    /**
     * @test update
     */
    public function test_update_cpas_stream()
    {
        $cpasStream = cpas_stream::factory()->create();
        $fakecpas_stream = cpas_stream::factory()->make()->toArray();

        $updatedcpas_stream = $this->cpasStreamRepo->update($fakecpas_stream, $cpasStream->id);

        $this->assertModelData($fakecpas_stream, $updatedcpas_stream->toArray());
        $dbcpas_stream = $this->cpasStreamRepo->find($cpasStream->id);
        $this->assertModelData($fakecpas_stream, $dbcpas_stream->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cpas_stream()
    {
        $cpasStream = cpas_stream::factory()->create();

        $resp = $this->cpasStreamRepo->delete($cpasStream->id);

        $this->assertTrue($resp);
        $this->assertNull(cpas_stream::find($cpasStream->id), 'cpas_stream should not exist in DB');
    }
}
