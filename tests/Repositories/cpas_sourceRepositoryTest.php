<?php namespace Tests\Repositories;

use App\Models\cpas_source;
use App\Repositories\cpas_sourceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cpas_sourceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cpas_sourceRepository
     */
    protected $cpasSourceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cpasSourceRepo = \App::make(cpas_sourceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cpas_source()
    {
        $cpasSource = cpas_source::factory()->make()->toArray();

        $createdcpas_source = $this->cpasSourceRepo->create($cpasSource);

        $createdcpas_source = $createdcpas_source->toArray();
        $this->assertArrayHasKey('id', $createdcpas_source);
        $this->assertNotNull($createdcpas_source['id'], 'Created cpas_source must have id specified');
        $this->assertNotNull(cpas_source::find($createdcpas_source['id']), 'cpas_source with given id must be in DB');
        $this->assertModelData($cpasSource, $createdcpas_source);
    }

    /**
     * @test read
     */
    public function test_read_cpas_source()
    {
        $cpasSource = cpas_source::factory()->create();

        $dbcpas_source = $this->cpasSourceRepo->find($cpasSource->id);

        $dbcpas_source = $dbcpas_source->toArray();
        $this->assertModelData($cpasSource->toArray(), $dbcpas_source);
    }

    /**
     * @test update
     */
    public function test_update_cpas_source()
    {
        $cpasSource = cpas_source::factory()->create();
        $fakecpas_source = cpas_source::factory()->make()->toArray();

        $updatedcpas_source = $this->cpasSourceRepo->update($fakecpas_source, $cpasSource->id);

        $this->assertModelData($fakecpas_source, $updatedcpas_source->toArray());
        $dbcpas_source = $this->cpasSourceRepo->find($cpasSource->id);
        $this->assertModelData($fakecpas_source, $dbcpas_source->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cpas_source()
    {
        $cpasSource = cpas_source::factory()->create();

        $resp = $this->cpasSourceRepo->delete($cpasSource->id);

        $this->assertTrue($resp);
        $this->assertNull(cpas_source::find($cpasSource->id), 'cpas_source should not exist in DB');
    }
}
