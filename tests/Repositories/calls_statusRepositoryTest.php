<?php namespace Tests\Repositories;

use App\Models\calls_status;
use App\Repositories\calls_statusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_statusRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_statusRepository
     */
    protected $callsStatusRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsStatusRepo = \App::make(calls_statusRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_status()
    {
        $callsStatus = calls_status::factory()->make()->toArray();

        $createdcalls_status = $this->callsStatusRepo->create($callsStatus);

        $createdcalls_status = $createdcalls_status->toArray();
        $this->assertArrayHasKey('id', $createdcalls_status);
        $this->assertNotNull($createdcalls_status['id'], 'Created calls_status must have id specified');
        $this->assertNotNull(calls_status::find($createdcalls_status['id']), 'calls_status with given id must be in DB');
        $this->assertModelData($callsStatus, $createdcalls_status);
    }

    /**
     * @test read
     */
    public function test_read_calls_status()
    {
        $callsStatus = calls_status::factory()->create();

        $dbcalls_status = $this->callsStatusRepo->find($callsStatus->id);

        $dbcalls_status = $dbcalls_status->toArray();
        $this->assertModelData($callsStatus->toArray(), $dbcalls_status);
    }

    /**
     * @test update
     */
    public function test_update_calls_status()
    {
        $callsStatus = calls_status::factory()->create();
        $fakecalls_status = calls_status::factory()->make()->toArray();

        $updatedcalls_status = $this->callsStatusRepo->update($fakecalls_status, $callsStatus->id);

        $this->assertModelData($fakecalls_status, $updatedcalls_status->toArray());
        $dbcalls_status = $this->callsStatusRepo->find($callsStatus->id);
        $this->assertModelData($fakecalls_status, $dbcalls_status->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_status()
    {
        $callsStatus = calls_status::factory()->create();

        $resp = $this->callsStatusRepo->delete($callsStatus->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_status::find($callsStatus->id), 'calls_status should not exist in DB');
    }
}
