<?php namespace Tests\Repositories;

use App\Models\cpas_tracker;
use App\Repositories\cpas_trackerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cpas_trackerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cpas_trackerRepository
     */
    protected $cpasTrackerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cpasTrackerRepo = \App::make(cpas_trackerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cpas_tracker()
    {
        $cpasTracker = cpas_tracker::factory()->make()->toArray();

        $createdcpas_tracker = $this->cpasTrackerRepo->create($cpasTracker);

        $createdcpas_tracker = $createdcpas_tracker->toArray();
        $this->assertArrayHasKey('id', $createdcpas_tracker);
        $this->assertNotNull($createdcpas_tracker['id'], 'Created cpas_tracker must have id specified');
        $this->assertNotNull(cpas_tracker::find($createdcpas_tracker['id']), 'cpas_tracker with given id must be in DB');
        $this->assertModelData($cpasTracker, $createdcpas_tracker);
    }

    /**
     * @test read
     */
    public function test_read_cpas_tracker()
    {
        $cpasTracker = cpas_tracker::factory()->create();

        $dbcpas_tracker = $this->cpasTrackerRepo->find($cpasTracker->id);

        $dbcpas_tracker = $dbcpas_tracker->toArray();
        $this->assertModelData($cpasTracker->toArray(), $dbcpas_tracker);
    }

    /**
     * @test update
     */
    public function test_update_cpas_tracker()
    {
        $cpasTracker = cpas_tracker::factory()->create();
        $fakecpas_tracker = cpas_tracker::factory()->make()->toArray();

        $updatedcpas_tracker = $this->cpasTrackerRepo->update($fakecpas_tracker, $cpasTracker->id);

        $this->assertModelData($fakecpas_tracker, $updatedcpas_tracker->toArray());
        $dbcpas_tracker = $this->cpasTrackerRepo->find($cpasTracker->id);
        $this->assertModelData($fakecpas_tracker, $dbcpas_tracker->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cpas_tracker()
    {
        $cpasTracker = cpas_tracker::factory()->create();

        $resp = $this->cpasTrackerRepo->delete($cpasTracker->id);

        $this->assertTrue($resp);
        $this->assertNull(cpas_tracker::find($cpasTracker->id), 'cpas_tracker should not exist in DB');
    }
}
