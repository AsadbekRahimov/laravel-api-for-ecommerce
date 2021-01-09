<?php namespace Tests\Repositories;

use App\Models\core_queue;
use App\Repositories\core_queueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class core_queueRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var core_queueRepository
     */
    protected $coreQueueRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coreQueueRepo = \App::make(core_queueRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_core_queue()
    {
        $coreQueue = core_queue::factory()->make()->toArray();

        $createdcore_queue = $this->coreQueueRepo->create($coreQueue);

        $createdcore_queue = $createdcore_queue->toArray();
        $this->assertArrayHasKey('id', $createdcore_queue);
        $this->assertNotNull($createdcore_queue['id'], 'Created core_queue must have id specified');
        $this->assertNotNull(core_queue::find($createdcore_queue['id']), 'core_queue with given id must be in DB');
        $this->assertModelData($coreQueue, $createdcore_queue);
    }

    /**
     * @test read
     */
    public function test_read_core_queue()
    {
        $coreQueue = core_queue::factory()->create();

        $dbcore_queue = $this->coreQueueRepo->find($coreQueue->id);

        $dbcore_queue = $dbcore_queue->toArray();
        $this->assertModelData($coreQueue->toArray(), $dbcore_queue);
    }

    /**
     * @test update
     */
    public function test_update_core_queue()
    {
        $coreQueue = core_queue::factory()->create();
        $fakecore_queue = core_queue::factory()->make()->toArray();

        $updatedcore_queue = $this->coreQueueRepo->update($fakecore_queue, $coreQueue->id);

        $this->assertModelData($fakecore_queue, $updatedcore_queue->toArray());
        $dbcore_queue = $this->coreQueueRepo->find($coreQueue->id);
        $this->assertModelData($fakecore_queue, $dbcore_queue->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_core_queue()
    {
        $coreQueue = core_queue::factory()->create();

        $resp = $this->coreQueueRepo->delete($coreQueue->id);

        $this->assertTrue($resp);
        $this->assertNull(core_queue::find($coreQueue->id), 'core_queue should not exist in DB');
    }
}
