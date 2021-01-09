<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_status_time;

class calls_status_timeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_status_time()
    {
        $callsStatusTime = calls_status_time::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_status_times', $callsStatusTime
        );

        $this->assertApiResponse($callsStatusTime);
    }

    /**
     * @test
     */
    public function test_read_calls_status_time()
    {
        $callsStatusTime = calls_status_time::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_status_times/'.$callsStatusTime->id
        );

        $this->assertApiResponse($callsStatusTime->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_status_time()
    {
        $callsStatusTime = calls_status_time::factory()->create();
        $editedcalls_status_time = calls_status_time::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_status_times/'.$callsStatusTime->id,
            $editedcalls_status_time
        );

        $this->assertApiResponse($editedcalls_status_time);
    }

    /**
     * @test
     */
    public function test_delete_calls_status_time()
    {
        $callsStatusTime = calls_status_time::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_status_times/'.$callsStatusTime->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_status_times/'.$callsStatusTime->id
        );

        $this->response->assertStatus(404);
    }
}
