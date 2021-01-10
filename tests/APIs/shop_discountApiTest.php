<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_discount;

class shop_discountApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_discount()
    {
        $shopDiscount = shop_discount::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_discounts', $shopDiscount
        );

        $this->assertApiResponse($shopDiscount);
    }

    /**
     * @test
     */
    public function test_read_shop_discount()
    {
        $shopDiscount = shop_discount::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_discounts/'.$shopDiscount->id
        );

        $this->assertApiResponse($shopDiscount->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_discount()
    {
        $shopDiscount = shop_discount::factory()->create();
        $editedshop_discount = shop_discount::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_discounts/'.$shopDiscount->id,
            $editedshop_discount
        );

        $this->assertApiResponse($editedshop_discount);
    }

    /**
     * @test
     */
    public function test_delete_shop_discount()
    {
        $shopDiscount = shop_discount::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_discounts/'.$shopDiscount->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_discounts/'.$shopDiscount->id
        );

        $this->response->assertStatus(404);
    }
}
