<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cpas_pays_history;

class cpas_pays_historyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cpas_pays_history()
    {
        $cpasPaysHistory = cpas_pays_history::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cpas_pays_histories', $cpasPaysHistory
        );

        $this->assertApiResponse($cpasPaysHistory);
    }

    /**
     * @test
     */
    public function test_read_cpas_pays_history()
    {
        $cpasPaysHistory = cpas_pays_history::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cpas_pays_histories/'.$cpasPaysHistory->id
        );

        $this->assertApiResponse($cpasPaysHistory->toArray());
    }

    /**
     * @test
     */
    public function test_update_cpas_pays_history()
    {
        $cpasPaysHistory = cpas_pays_history::factory()->create();
        $editedcpas_pays_history = cpas_pays_history::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cpas_pays_histories/'.$cpasPaysHistory->id,
            $editedcpas_pays_history
        );

        $this->assertApiResponse($editedcpas_pays_history);
    }

    /**
     * @test
     */
    public function test_delete_cpas_pays_history()
    {
        $cpasPaysHistory = cpas_pays_history::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cpas_pays_histories/'.$cpasPaysHistory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cpas_pays_histories/'.$cpasPaysHistory->id
        );

        $this->response->assertStatus(404);
    }
}
