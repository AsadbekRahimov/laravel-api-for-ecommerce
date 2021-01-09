<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cpas_tracker;

class cpas_trackerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cpas_tracker()
    {
        $cpasTracker = cpas_tracker::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cpas_trackers', $cpasTracker
        );

        $this->assertApiResponse($cpasTracker);
    }

    /**
     * @test
     */
    public function test_read_cpas_tracker()
    {
        $cpasTracker = cpas_tracker::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cpas_trackers/'.$cpasTracker->id
        );

        $this->assertApiResponse($cpasTracker->toArray());
    }

    /**
     * @test
     */
    public function test_update_cpas_tracker()
    {
        $cpasTracker = cpas_tracker::factory()->create();
        $editedcpas_tracker = cpas_tracker::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cpas_trackers/'.$cpasTracker->id,
            $editedcpas_tracker
        );

        $this->assertApiResponse($editedcpas_tracker);
    }

    /**
     * @test
     */
    public function test_delete_cpas_tracker()
    {
        $cpasTracker = cpas_tracker::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cpas_trackers/'.$cpasTracker->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cpas_trackers/'.$cpasTracker->id
        );

        $this->response->assertStatus(404);
    }
}
