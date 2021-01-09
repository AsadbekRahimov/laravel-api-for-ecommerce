<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\page_app;

class page_appApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_page_app()
    {
        $pageApp = page_app::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/page_apps', $pageApp
        );

        $this->assertApiResponse($pageApp);
    }

    /**
     * @test
     */
    public function test_read_page_app()
    {
        $pageApp = page_app::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/page_apps/'.$pageApp->id
        );

        $this->assertApiResponse($pageApp->toArray());
    }

    /**
     * @test
     */
    public function test_update_page_app()
    {
        $pageApp = page_app::factory()->create();
        $editedpage_app = page_app::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/page_apps/'.$pageApp->id,
            $editedpage_app
        );

        $this->assertApiResponse($editedpage_app);
    }

    /**
     * @test
     */
    public function test_delete_page_app()
    {
        $pageApp = page_app::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/page_apps/'.$pageApp->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/page_apps/'.$pageApp->id
        );

        $this->response->assertStatus(404);
    }
}
