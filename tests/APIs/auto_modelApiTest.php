<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\auto_model;

class auto_modelApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_auto_model()
    {
        $autoModel = auto_model::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/auto_models', $autoModel
        );

        $this->assertApiResponse($autoModel);
    }

    /**
     * @test
     */
    public function test_read_auto_model()
    {
        $autoModel = auto_model::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/auto_models/'.$autoModel->id
        );

        $this->assertApiResponse($autoModel->toArray());
    }

    /**
     * @test
     */
    public function test_update_auto_model()
    {
        $autoModel = auto_model::factory()->create();
        $editedauto_model = auto_model::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/auto_models/'.$autoModel->id,
            $editedauto_model
        );

        $this->assertApiResponse($editedauto_model);
    }

    /**
     * @test
     */
    public function test_delete_auto_model()
    {
        $autoModel = auto_model::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/auto_models/'.$autoModel->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/auto_models/'.$autoModel->id
        );

        $this->response->assertStatus(404);
    }
}
