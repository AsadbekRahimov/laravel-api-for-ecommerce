<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\core_analytics;

class core_analyticsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_core_analytics()
    {
        $coreAnalytics = core_analytics::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/core_analytics', $coreAnalytics
        );

        $this->assertApiResponse($coreAnalytics);
    }

    /**
     * @test
     */
    public function test_read_core_analytics()
    {
        $coreAnalytics = core_analytics::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/core_analytics/'.$coreAnalytics->id
        );

        $this->assertApiResponse($coreAnalytics->toArray());
    }

    /**
     * @test
     */
    public function test_update_core_analytics()
    {
        $coreAnalytics = core_analytics::factory()->create();
        $editedcore_analytics = core_analytics::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/core_analytics/'.$coreAnalytics->id,
            $editedcore_analytics
        );

        $this->assertApiResponse($editedcore_analytics);
    }

    /**
     * @test
     */
    public function test_delete_core_analytics()
    {
        $coreAnalytics = core_analytics::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/core_analytics/'.$coreAnalytics->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/core_analytics/'.$coreAnalytics->id
        );

        $this->response->assertStatus(404);
    }
}
