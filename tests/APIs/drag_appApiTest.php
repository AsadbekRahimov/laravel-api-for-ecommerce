<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\drag_app;

class drag_appApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_drag_app()
    {
        $dragApp = drag_app::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/drag_apps', $dragApp
        );

        $this->assertApiResponse($dragApp);
    }

    /**
     * @test
     */
    public function test_read_drag_app()
    {
        $dragApp = drag_app::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/drag_apps/'.$dragApp->id
        );

        $this->assertApiResponse($dragApp->toArray());
    }

    /**
     * @test
     */
    public function test_update_drag_app()
    {
        $dragApp = drag_app::factory()->create();
        $editeddrag_app = drag_app::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/drag_apps/'.$dragApp->id,
            $editeddrag_app
        );

        $this->assertApiResponse($editeddrag_app);
    }

    /**
     * @test
     */
    public function test_delete_drag_app()
    {
        $dragApp = drag_app::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/drag_apps/'.$dragApp->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/drag_apps/'.$dragApp->id
        );

        $this->response->assertStatus(404);
    }
}
