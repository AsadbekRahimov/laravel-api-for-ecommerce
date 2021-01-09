<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\dyna_stats;

class dyna_statsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dyna_stats()
    {
        $dynaStats = dyna_stats::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dyna_stats', $dynaStats
        );

        $this->assertApiResponse($dynaStats);
    }

    /**
     * @test
     */
    public function test_read_dyna_stats()
    {
        $dynaStats = dyna_stats::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dyna_stats/'.$dynaStats->id
        );

        $this->assertApiResponse($dynaStats->toArray());
    }

    /**
     * @test
     */
    public function test_update_dyna_stats()
    {
        $dynaStats = dyna_stats::factory()->create();
        $editeddyna_stats = dyna_stats::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dyna_stats/'.$dynaStats->id,
            $editeddyna_stats
        );

        $this->assertApiResponse($editeddyna_stats);
    }

    /**
     * @test
     */
    public function test_delete_dyna_stats()
    {
        $dynaStats = dyna_stats::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dyna_stats/'.$dynaStats->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dyna_stats/'.$dynaStats->id
        );

        $this->response->assertStatus(404);
    }
}
