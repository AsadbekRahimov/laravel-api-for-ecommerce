<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\core_history;

class core_historyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_core_history()
    {
        $coreHistory = core_history::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/core_histories', $coreHistory
        );

        $this->assertApiResponse($coreHistory);
    }

    /**
     * @test
     */
    public function test_read_core_history()
    {
        $coreHistory = core_history::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/core_histories/'.$coreHistory->id
        );

        $this->assertApiResponse($coreHistory->toArray());
    }

    /**
     * @test
     */
    public function test_update_core_history()
    {
        $coreHistory = core_history::factory()->create();
        $editedcore_history = core_history::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/core_histories/'.$coreHistory->id,
            $editedcore_history
        );

        $this->assertApiResponse($editedcore_history);
    }

    /**
     * @test
     */
    public function test_delete_core_history()
    {
        $coreHistory = core_history::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/core_histories/'.$coreHistory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/core_histories/'.$coreHistory->id
        );

        $this->response->assertStatus(404);
    }
}
