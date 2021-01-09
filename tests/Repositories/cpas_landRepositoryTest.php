<?php namespace Tests\Repositories;

use App\Models\cpas_land;
use App\Repositories\cpas_landRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cpas_landRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cpas_landRepository
     */
    protected $cpasLandRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cpasLandRepo = \App::make(cpas_landRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cpas_land()
    {
        $cpasLand = cpas_land::factory()->make()->toArray();

        $createdcpas_land = $this->cpasLandRepo->create($cpasLand);

        $createdcpas_land = $createdcpas_land->toArray();
        $this->assertArrayHasKey('id', $createdcpas_land);
        $this->assertNotNull($createdcpas_land['id'], 'Created cpas_land must have id specified');
        $this->assertNotNull(cpas_land::find($createdcpas_land['id']), 'cpas_land with given id must be in DB');
        $this->assertModelData($cpasLand, $createdcpas_land);
    }

    /**
     * @test read
     */
    public function test_read_cpas_land()
    {
        $cpasLand = cpas_land::factory()->create();

        $dbcpas_land = $this->cpasLandRepo->find($cpasLand->id);

        $dbcpas_land = $dbcpas_land->toArray();
        $this->assertModelData($cpasLand->toArray(), $dbcpas_land);
    }

    /**
     * @test update
     */
    public function test_update_cpas_land()
    {
        $cpasLand = cpas_land::factory()->create();
        $fakecpas_land = cpas_land::factory()->make()->toArray();

        $updatedcpas_land = $this->cpasLandRepo->update($fakecpas_land, $cpasLand->id);

        $this->assertModelData($fakecpas_land, $updatedcpas_land->toArray());
        $dbcpas_land = $this->cpasLandRepo->find($cpasLand->id);
        $this->assertModelData($fakecpas_land, $dbcpas_land->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cpas_land()
    {
        $cpasLand = cpas_land::factory()->create();

        $resp = $this->cpasLandRepo->delete($cpasLand->id);

        $this->assertTrue($resp);
        $this->assertNull(cpas_land::find($cpasLand->id), 'cpas_land should not exist in DB');
    }
}
