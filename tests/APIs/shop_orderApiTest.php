<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_order;

class shop_orderApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_order()
    {
        $shopOrder = shop_order::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_orders', $shopOrder
        );

        $this->assertApiResponse($shopOrder);
    }

    /**
     * @test
     */
    public function test_read_shop_order()
    {
        $shopOrder = shop_order::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_orders/'.$shopOrder->id
        );

        $this->assertApiResponse($shopOrder->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_order()
    {
        $shopOrder = shop_order::factory()->create();
        $editedshop_order = shop_order::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_orders/'.$shopOrder->id,
            $editedshop_order
        );

        $this->assertApiResponse($editedshop_order);
    }

    /**
     * @test
     */
    public function test_delete_shop_order()
    {
        $shopOrder = shop_order::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_orders/'.$shopOrder->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_orders/'.$shopOrder->id
        );

        $this->response->assertStatus(404);
    }
}
