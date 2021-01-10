<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_category;

class shop_categoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_category()
    {
        $shopCategory = shop_category::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_categories', $shopCategory
        );

        $this->assertApiResponse($shopCategory);
    }

    /**
     * @test
     */
    public function test_read_shop_category()
    {
        $shopCategory = shop_category::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_categories/'.$shopCategory->id
        );

        $this->assertApiResponse($shopCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_category()
    {
        $shopCategory = shop_category::factory()->create();
        $editedshop_category = shop_category::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_categories/'.$shopCategory->id,
            $editedshop_category
        );

        $this->assertApiResponse($editedshop_category);
    }

    /**
     * @test
     */
    public function test_delete_shop_category()
    {
        $shopCategory = shop_category::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_categories/'.$shopCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_categories/'.$shopCategory->id
        );

        $this->response->assertStatus(404);
    }
}
