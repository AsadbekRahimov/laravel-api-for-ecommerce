<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_order_item;

class shop_order_itemApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_order_item()
    {
        $shopOrderItem = shop_order_item::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_order_items', $shopOrderItem
        );

        $this->assertApiResponse($shopOrderItem);
    }

    /**
     * @test
     */
    public function test_read_shop_order_item()
    {
        $shopOrderItem = shop_order_item::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_order_items/'.$shopOrderItem->id
        );

        $this->assertApiResponse($shopOrderItem->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_order_item()
    {
        $shopOrderItem = shop_order_item::factory()->create();
        $editedshop_order_item = shop_order_item::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_order_items/'.$shopOrderItem->id,
            $editedshop_order_item
        );

        $this->assertApiResponse($editedshop_order_item);
    }

    /**
     * @test
     */
    public function test_delete_shop_order_item()
    {
        $shopOrderItem = shop_order_item::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_order_items/'.$shopOrderItem->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_order_items/'.$shopOrderItem->id
        );

        $this->response->assertStatus(404);
    }
}
