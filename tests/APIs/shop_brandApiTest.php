<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_brand;

class shop_brandApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_brand()
    {
        $shopBrand = shop_brand::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_brands', $shopBrand
        );

        $this->assertApiResponse($shopBrand);
    }

    /**
     * @test
     */
    public function test_read_shop_brand()
    {
        $shopBrand = shop_brand::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_brands/'.$shopBrand->id
        );

        $this->assertApiResponse($shopBrand->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_brand()
    {
        $shopBrand = shop_brand::factory()->create();
        $editedshop_brand = shop_brand::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_brands/'.$shopBrand->id,
            $editedshop_brand
        );

        $this->assertApiResponse($editedshop_brand);
    }

    /**
     * @test
     */
    public function test_delete_shop_brand()
    {
        $shopBrand = shop_brand::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_brands/'.$shopBrand->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_brands/'.$shopBrand->id
        );

        $this->response->assertStatus(404);
    }
}
