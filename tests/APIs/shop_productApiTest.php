<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_product;

class shop_productApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_product()
    {
        $shopProduct = shop_product::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_products', $shopProduct
        );

        $this->assertApiResponse($shopProduct);
    }

    /**
     * @test
     */
    public function test_read_shop_product()
    {
        $shopProduct = shop_product::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_products/'.$shopProduct->id
        );

        $this->assertApiResponse($shopProduct->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_product()
    {
        $shopProduct = shop_product::factory()->create();
        $editedshop_product = shop_product::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_products/'.$shopProduct->id,
            $editedshop_product
        );

        $this->assertApiResponse($editedshop_product);
    }

    /**
     * @test
     */
    public function test_delete_shop_product()
    {
        $shopProduct = shop_product::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_products/'.$shopProduct->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_products/'.$shopProduct->id
        );

        $this->response->assertStatus(404);
    }
}
