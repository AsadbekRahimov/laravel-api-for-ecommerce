<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_status;

class calls_statusApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_status()
    {
        $callsStatus = calls_status::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_statuses', $callsStatus
        );

        $this->assertApiResponse($callsStatus);
    }

    /**
     * @test
     */
    public function test_read_calls_status()
    {
        $callsStatus = calls_status::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_statuses/'.$callsStatus->id
        );

        $this->assertApiResponse($callsStatus->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_status()
    {
        $callsStatus = calls_status::factory()->create();
        $editedcalls_status = calls_status::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_statuses/'.$callsStatus->id,
            $editedcalls_status
        );

        $this->assertApiResponse($editedcalls_status);
    }

    /**
     * @test
     */
    public function test_delete_calls_status()
    {
        $callsStatus = calls_status::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_statuses/'.$callsStatus->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_statuses/'.$callsStatus->id
        );

        $this->response->assertStatus(404);
    }
}
