<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\drag_config;

class drag_configApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_drag_config()
    {
        $dragConfig = drag_config::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/drag_configs', $dragConfig
        );

        $this->assertApiResponse($dragConfig);
    }

    /**
     * @test
     */
    public function test_read_drag_config()
    {
        $dragConfig = drag_config::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/drag_configs/'.$dragConfig->id
        );

        $this->assertApiResponse($dragConfig->toArray());
    }

    /**
     * @test
     */
    public function test_update_drag_config()
    {
        $dragConfig = drag_config::factory()->create();
        $editeddrag_config = drag_config::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/drag_configs/'.$dragConfig->id,
            $editeddrag_config
        );

        $this->assertApiResponse($editeddrag_config);
    }

    /**
     * @test
     */
    public function test_delete_drag_config()
    {
        $dragConfig = drag_config::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/drag_configs/'.$dragConfig->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/drag_configs/'.$dragConfig->id
        );

        $this->response->assertStatus(404);
    }
}
