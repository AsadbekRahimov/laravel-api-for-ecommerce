<?php namespace Tests\Repositories;

use App\Models\maps_navigate;
use App\Repositories\maps_navigateRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class maps_navigateRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var maps_navigateRepository
     */
    protected $mapsNavigateRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->mapsNavigateRepo = \App::make(maps_navigateRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_maps_navigate()
    {
        $mapsNavigate = maps_navigate::factory()->make()->toArray();

        $createdmaps_navigate = $this->mapsNavigateRepo->create($mapsNavigate);

        $createdmaps_navigate = $createdmaps_navigate->toArray();
        $this->assertArrayHasKey('id', $createdmaps_navigate);
        $this->assertNotNull($createdmaps_navigate['id'], 'Created maps_navigate must have id specified');
        $this->assertNotNull(maps_navigate::find($createdmaps_navigate['id']), 'maps_navigate with given id must be in DB');
        $this->assertModelData($mapsNavigate, $createdmaps_navigate);
    }

    /**
     * @test read
     */
    public function test_read_maps_navigate()
    {
        $mapsNavigate = maps_navigate::factory()->create();

        $dbmaps_navigate = $this->mapsNavigateRepo->find($mapsNavigate->id);

        $dbmaps_navigate = $dbmaps_navigate->toArray();
        $this->assertModelData($mapsNavigate->toArray(), $dbmaps_navigate);
    }

    /**
     * @test update
     */
    public function test_update_maps_navigate()
    {
        $mapsNavigate = maps_navigate::factory()->create();
        $fakemaps_navigate = maps_navigate::factory()->make()->toArray();

        $updatedmaps_navigate = $this->mapsNavigateRepo->update($fakemaps_navigate, $mapsNavigate->id);

        $this->assertModelData($fakemaps_navigate, $updatedmaps_navigate->toArray());
        $dbmaps_navigate = $this->mapsNavigateRepo->find($mapsNavigate->id);
        $this->assertModelData($fakemaps_navigate, $dbmaps_navigate->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_maps_navigate()
    {
        $mapsNavigate = maps_navigate::factory()->create();

        $resp = $this->mapsNavigateRepo->delete($mapsNavigate->id);

        $this->assertTrue($resp);
        $this->assertNull(maps_navigate::find($mapsNavigate->id), 'maps_navigate should not exist in DB');
    }
}
