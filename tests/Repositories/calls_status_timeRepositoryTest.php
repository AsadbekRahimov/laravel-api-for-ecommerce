<?php namespace Tests\Repositories;

use App\Models\calls_status_time;
use App\Repositories\calls_status_timeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_status_timeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_status_timeRepository
     */
    protected $callsStatusTimeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsStatusTimeRepo = \App::make(calls_status_timeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_status_time()
    {
        $callsStatusTime = calls_status_time::factory()->make()->toArray();

        $createdcalls_status_time = $this->callsStatusTimeRepo->create($callsStatusTime);

        $createdcalls_status_time = $createdcalls_status_time->toArray();
        $this->assertArrayHasKey('id', $createdcalls_status_time);
        $this->assertNotNull($createdcalls_status_time['id'], 'Created calls_status_time must have id specified');
        $this->assertNotNull(calls_status_time::find($createdcalls_status_time['id']), 'calls_status_time with given id must be in DB');
        $this->assertModelData($callsStatusTime, $createdcalls_status_time);
    }

    /**
     * @test read
     */
    public function test_read_calls_status_time()
    {
        $callsStatusTime = calls_status_time::factory()->create();

        $dbcalls_status_time = $this->callsStatusTimeRepo->find($callsStatusTime->id);

        $dbcalls_status_time = $dbcalls_status_time->toArray();
        $this->assertModelData($callsStatusTime->toArray(), $dbcalls_status_time);
    }

    /**
     * @test update
     */
    public function test_update_calls_status_time()
    {
        $callsStatusTime = calls_status_time::factory()->create();
        $fakecalls_status_time = calls_status_time::factory()->make()->toArray();

        $updatedcalls_status_time = $this->callsStatusTimeRepo->update($fakecalls_status_time, $callsStatusTime->id);

        $this->assertModelData($fakecalls_status_time, $updatedcalls_status_time->toArray());
        $dbcalls_status_time = $this->callsStatusTimeRepo->find($callsStatusTime->id);
        $this->assertModelData($fakecalls_status_time, $dbcalls_status_time->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_status_time()
    {
        $callsStatusTime = calls_status_time::factory()->create();

        $resp = $this->callsStatusTimeRepo->delete($callsStatusTime->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_status_time::find($callsStatusTime->id), 'calls_status_time should not exist in DB');
    }
}
