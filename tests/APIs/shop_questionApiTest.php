<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_question;

class shop_questionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_question()
    {
        $shopQuestion = shop_question::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_questions', $shopQuestion
        );

        $this->assertApiResponse($shopQuestion);
    }

    /**
     * @test
     */
    public function test_read_shop_question()
    {
        $shopQuestion = shop_question::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_questions/'.$shopQuestion->id
        );

        $this->assertApiResponse($shopQuestion->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_question()
    {
        $shopQuestion = shop_question::factory()->create();
        $editedshop_question = shop_question::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_questions/'.$shopQuestion->id,
            $editedshop_question
        );

        $this->assertApiResponse($editedshop_question);
    }

    /**
     * @test
     */
    public function test_delete_shop_question()
    {
        $shopQuestion = shop_question::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_questions/'.$shopQuestion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_questions/'.$shopQuestion->id
        );

        $this->response->assertStatus(404);
    }
}
