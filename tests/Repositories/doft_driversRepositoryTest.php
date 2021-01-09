<?php namespace Tests\Repositories;

use App\Models\doft_drivers;
use App\Repositories\doft_driversRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class doft_driversRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var doft_driversRepository
     */
    protected $doftDriversRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->doftDriversRepo = \App::make(doft_driversRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_doft_drivers()
    {
        $doftDrivers = doft_drivers::factory()->make()->toArray();

        $createddoft_drivers = $this->doftDriversRepo->create($doftDrivers);

        $createddoft_drivers = $createddoft_drivers->toArray();
        $this->assertArrayHasKey('id', $createddoft_drivers);
        $this->assertNotNull($createddoft_drivers['id'], 'Created doft_drivers must have id specified');
        $this->assertNotNull(doft_drivers::find($createddoft_drivers['id']), 'doft_drivers with given id must be in DB');
        $this->assertModelData($doftDrivers, $createddoft_drivers);
    }

    /**
     * @test read
     */
    public function test_read_doft_drivers()
    {
        $doftDrivers = doft_drivers::factory()->create();

        $dbdoft_drivers = $this->doftDriversRepo->find($doftDrivers->id);

        $dbdoft_drivers = $dbdoft_drivers->toArray();
        $this->assertModelData($doftDrivers->toArray(), $dbdoft_drivers);
    }

    /**
     * @test update
     */
    public function test_update_doft_drivers()
    {
        $doftDrivers = doft_drivers::factory()->create();
        $fakedoft_drivers = doft_drivers::factory()->make()->toArray();

        $updateddoft_drivers = $this->doftDriversRepo->update($fakedoft_drivers, $doftDrivers->id);

        $this->assertModelData($fakedoft_drivers, $updateddoft_drivers->toArray());
        $dbdoft_drivers = $this->doftDriversRepo->find($doftDrivers->id);
        $this->assertModelData($fakedoft_drivers, $dbdoft_drivers->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_doft_drivers()
    {
        $doftDrivers = doft_drivers::factory()->create();

        $resp = $this->doftDriversRepo->delete($doftDrivers->id);

        $this->assertTrue($resp);
        $this->assertNull(doft_drivers::find($doftDrivers->id), 'doft_drivers should not exist in DB');
    }
}
