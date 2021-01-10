<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_review;

class shop_reviewApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_review()
    {
        $shopReview = shop_review::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_reviews', $shopReview
        );

        $this->assertApiResponse($shopReview);
    }

    /**
     * @test
     */
    public function test_read_shop_review()
    {
        $shopReview = shop_review::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_reviews/'.$shopReview->id
        );

        $this->assertApiResponse($shopReview->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_review()
    {
        $shopReview = shop_review::factory()->create();
        $editedshop_review = shop_review::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_reviews/'.$shopReview->id,
            $editedshop_review
        );

        $this->assertApiResponse($editedshop_review);
    }

    /**
     * @test
     */
    public function test_delete_shop_review()
    {
        $shopReview = shop_review::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_reviews/'.$shopReview->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_reviews/'.$shopReview->id
        );

        $this->response->assertStatus(404);
    }
}
