<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_coupon;

class shop_couponApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_coupon()
    {
        $shopCoupon = shop_coupon::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_coupons', $shopCoupon
        );

        $this->assertApiResponse($shopCoupon);
    }

    /**
     * @test
     */
    public function test_read_shop_coupon()
    {
        $shopCoupon = shop_coupon::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_coupons/'.$shopCoupon->id
        );

        $this->assertApiResponse($shopCoupon->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_coupon()
    {
        $shopCoupon = shop_coupon::factory()->create();
        $editedshop_coupon = shop_coupon::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_coupons/'.$shopCoupon->id,
            $editedshop_coupon
        );

        $this->assertApiResponse($editedshop_coupon);
    }

    /**
     * @test
     */
    public function test_delete_shop_coupon()
    {
        $shopCoupon = shop_coupon::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_coupons/'.$shopCoupon->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_coupons/'.$shopCoupon->id
        );

        $this->response->assertStatus(404);
    }
}
