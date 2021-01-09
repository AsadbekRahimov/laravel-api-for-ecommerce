<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\news_type;

class news_typeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_news_type()
    {
        $newsType = news_type::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/news_types', $newsType
        );

        $this->assertApiResponse($newsType);
    }

    /**
     * @test
     */
    public function test_read_news_type()
    {
        $newsType = news_type::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/news_types/'.$newsType->id
        );

        $this->assertApiResponse($newsType->toArray());
    }

    /**
     * @test
     */
    public function test_update_news_type()
    {
        $newsType = news_type::factory()->create();
        $editednews_type = news_type::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/news_types/'.$newsType->id,
            $editednews_type
        );

        $this->assertApiResponse($editednews_type);
    }

    /**
     * @test
     */
    public function test_delete_news_type()
    {
        $newsType = news_type::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/news_types/'.$newsType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/news_types/'.$newsType->id
        );

        $this->response->assertStatus(404);
    }
}
