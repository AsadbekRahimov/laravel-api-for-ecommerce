<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_queue;

class calls_queueApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_queue()
    {
        $callsQueue = calls_queue::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_queues', $callsQueue
        );

        $this->assertApiResponse($callsQueue);
    }

    /**
     * @test
     */
    public function test_read_calls_queue()
    {
        $callsQueue = calls_queue::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_queues/'.$callsQueue->id
        );

        $this->assertApiResponse($callsQueue->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_queue()
    {
        $callsQueue = calls_queue::factory()->create();
        $editedcalls_queue = calls_queue::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_queues/'.$callsQueue->id,
            $editedcalls_queue
        );

        $this->assertApiResponse($editedcalls_queue);
    }

    /**
     * @test
     */
    public function test_delete_calls_queue()
    {
        $callsQueue = calls_queue::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_queues/'.$callsQueue->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_queues/'.$callsQueue->id
        );

        $this->response->assertStatus(404);
    }
}
