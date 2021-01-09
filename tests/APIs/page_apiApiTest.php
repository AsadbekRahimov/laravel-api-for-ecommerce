<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\page_api;

class page_apiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_page_api()
    {
        $pageApi = page_api::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/page_apis', $pageApi
        );

        $this->assertApiResponse($pageApi);
    }

    /**
     * @test
     */
    public function test_read_page_api()
    {
        $pageApi = page_api::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/page_apis/'.$pageApi->id
        );

        $this->assertApiResponse($pageApi->toArray());
    }

    /**
     * @test
     */
    public function test_update_page_api()
    {
        $pageApi = page_api::factory()->create();
        $editedpage_api = page_api::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/page_apis/'.$pageApi->id,
            $editedpage_api
        );

        $this->assertApiResponse($editedpage_api);
    }

    /**
     * @test
     */
    public function test_delete_page_api()
    {
        $pageApi = page_api::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/page_apis/'.$pageApi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/page_apis/'.$pageApi->id
        );

        $this->response->assertStatus(404);
    }
}
