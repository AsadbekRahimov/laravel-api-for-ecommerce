<?php namespace Tests\Repositories;

use App\Models\calls_queue;
use App\Repositories\calls_queueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_queueRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_queueRepository
     */
    protected $callsQueueRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsQueueRepo = \App::make(calls_queueRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_queue()
    {
        $callsQueue = calls_queue::factory()->make()->toArray();

        $createdcalls_queue = $this->callsQueueRepo->create($callsQueue);

        $createdcalls_queue = $createdcalls_queue->toArray();
        $this->assertArrayHasKey('id', $createdcalls_queue);
        $this->assertNotNull($createdcalls_queue['id'], 'Created calls_queue must have id specified');
        $this->assertNotNull(calls_queue::find($createdcalls_queue['id']), 'calls_queue with given id must be in DB');
        $this->assertModelData($callsQueue, $createdcalls_queue);
    }

    /**
     * @test read
     */
    public function test_read_calls_queue()
    {
        $callsQueue = calls_queue::factory()->create();

        $dbcalls_queue = $this->callsQueueRepo->find($callsQueue->id);

        $dbcalls_queue = $dbcalls_queue->toArray();
        $this->assertModelData($callsQueue->toArray(), $dbcalls_queue);
    }

    /**
     * @test update
     */
    public function test_update_calls_queue()
    {
        $callsQueue = calls_queue::factory()->create();
        $fakecalls_queue = calls_queue::factory()->make()->toArray();

        $updatedcalls_queue = $this->callsQueueRepo->update($fakecalls_queue, $callsQueue->id);

        $this->assertModelData($fakecalls_queue, $updatedcalls_queue->toArray());
        $dbcalls_queue = $this->callsQueueRepo->find($callsQueue->id);
        $this->assertModelData($fakecalls_queue, $dbcalls_queue->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_queue()
    {
        $callsQueue = calls_queue::factory()->create();

        $resp = $this->callsQueueRepo->delete($callsQueue->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_queue::find($callsQueue->id), 'calls_queue should not exist in DB');
    }
}
