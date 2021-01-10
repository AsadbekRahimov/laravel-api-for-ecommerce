<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_courier;

class shop_courierApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_courier()
    {
        $shopCourier = shop_courier::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_couriers', $shopCourier
        );

        $this->assertApiResponse($shopCourier);
    }

    /**
     * @test
     */
    public function test_read_shop_courier()
    {
        $shopCourier = shop_courier::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_couriers/'.$shopCourier->id
        );

        $this->assertApiResponse($shopCourier->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_courier()
    {
        $shopCourier = shop_courier::factory()->create();
        $editedshop_courier = shop_courier::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_couriers/'.$shopCourier->id,
            $editedshop_courier
        );

        $this->assertApiResponse($editedshop_courier);
    }

    /**
     * @test
     */
    public function test_delete_shop_courier()
    {
        $shopCourier = shop_courier::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_couriers/'.$shopCourier->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_couriers/'.$shopCourier->id
        );

        $this->response->assertStatus(404);
    }
}
