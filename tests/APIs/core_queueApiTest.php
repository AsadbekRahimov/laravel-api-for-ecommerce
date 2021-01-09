<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\core_queue;

class core_queueApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_core_queue()
    {
        $coreQueue = core_queue::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/core_queues', $coreQueue
        );

        $this->assertApiResponse($coreQueue);
    }

    /**
     * @test
     */
    public function test_read_core_queue()
    {
        $coreQueue = core_queue::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/core_queues/'.$coreQueue->id
        );

        $this->assertApiResponse($coreQueue->toArray());
    }

    /**
     * @test
     */
    public function test_update_core_queue()
    {
        $coreQueue = core_queue::factory()->create();
        $editedcore_queue = core_queue::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/core_queues/'.$coreQueue->id,
            $editedcore_queue
        );

        $this->assertApiResponse($editedcore_queue);
    }

    /**
     * @test
     */
    public function test_delete_core_queue()
    {
        $coreQueue = core_queue::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/core_queues/'.$coreQueue->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/core_queues/'.$coreQueue->id
        );

        $this->response->assertStatus(404);
    }
}
