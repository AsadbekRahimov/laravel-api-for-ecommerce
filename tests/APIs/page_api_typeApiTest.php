<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\page_api_type;

class page_api_typeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_page_api_type()
    {
        $pageApiType = page_api_type::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/page_api_types', $pageApiType
        );

        $this->assertApiResponse($pageApiType);
    }

    /**
     * @test
     */
    public function test_read_page_api_type()
    {
        $pageApiType = page_api_type::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/page_api_types/'.$pageApiType->id
        );

        $this->assertApiResponse($pageApiType->toArray());
    }

    /**
     * @test
     */
    public function test_update_page_api_type()
    {
        $pageApiType = page_api_type::factory()->create();
        $editedpage_api_type = page_api_type::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/page_api_types/'.$pageApiType->id,
            $editedpage_api_type
        );

        $this->assertApiResponse($editedpage_api_type);
    }

    /**
     * @test
     */
    public function test_delete_page_api_type()
    {
        $pageApiType = page_api_type::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/page_api_types/'.$pageApiType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/page_api_types/'.$pageApiType->id
        );

        $this->response->assertStatus(404);
    }
}
