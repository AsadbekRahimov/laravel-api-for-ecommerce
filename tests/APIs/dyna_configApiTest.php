<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\dyna_config;

class dyna_configApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dyna_config()
    {
        $dynaConfig = dyna_config::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dyna_configs', $dynaConfig
        );

        $this->assertApiResponse($dynaConfig);
    }

    /**
     * @test
     */
    public function test_read_dyna_config()
    {
        $dynaConfig = dyna_config::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dyna_configs/'.$dynaConfig->id
        );

        $this->assertApiResponse($dynaConfig->toArray());
    }

    /**
     * @test
     */
    public function test_update_dyna_config()
    {
        $dynaConfig = dyna_config::factory()->create();
        $editeddyna_config = dyna_config::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dyna_configs/'.$dynaConfig->id,
            $editeddyna_config
        );

        $this->assertApiResponse($editeddyna_config);
    }

    /**
     * @test
     */
    public function test_delete_dyna_config()
    {
        $dynaConfig = dyna_config::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dyna_configs/'.$dynaConfig->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dyna_configs/'.$dynaConfig->id
        );

        $this->response->assertStatus(404);
    }
}
