<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_review_option;

class shop_review_optionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_review_option()
    {
        $shopReviewOption = shop_review_option::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_review_options', $shopReviewOption
        );

        $this->assertApiResponse($shopReviewOption);
    }

    /**
     * @test
     */
    public function test_read_shop_review_option()
    {
        $shopReviewOption = shop_review_option::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_review_options/'.$shopReviewOption->id
        );

        $this->assertApiResponse($shopReviewOption->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_review_option()
    {
        $shopReviewOption = shop_review_option::factory()->create();
        $editedshop_review_option = shop_review_option::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_review_options/'.$shopReviewOption->id,
            $editedshop_review_option
        );

        $this->assertApiResponse($editedshop_review_option);
    }

    /**
     * @test
     */
    public function test_delete_shop_review_option()
    {
        $shopReviewOption = shop_review_option::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_review_options/'.$shopReviewOption->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_review_options/'.$shopReviewOption->id
        );

        $this->response->assertStatus(404);
    }
}
