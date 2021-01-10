<?php namespace Tests\Repositories;

use App\Models\shop_coupon;
use App\Repositories\shop_couponRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_couponRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_couponRepository
     */
    protected $shopCouponRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopCouponRepo = \App::make(shop_couponRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_coupon()
    {
        $shopCoupon = shop_coupon::factory()->make()->toArray();

        $createdshop_coupon = $this->shopCouponRepo->create($shopCoupon);

        $createdshop_coupon = $createdshop_coupon->toArray();
        $this->assertArrayHasKey('id', $createdshop_coupon);
        $this->assertNotNull($createdshop_coupon['id'], 'Created shop_coupon must have id specified');
        $this->assertNotNull(shop_coupon::find($createdshop_coupon['id']), 'shop_coupon with given id must be in DB');
        $this->assertModelData($shopCoupon, $createdshop_coupon);
    }

    /**
     * @test read
     */
    public function test_read_shop_coupon()
    {
        $shopCoupon = shop_coupon::factory()->create();

        $dbshop_coupon = $this->shopCouponRepo->find($shopCoupon->id);

        $dbshop_coupon = $dbshop_coupon->toArray();
        $this->assertModelData($shopCoupon->toArray(), $dbshop_coupon);
    }

    /**
     * @test update
     */
    public function test_update_shop_coupon()
    {
        $shopCoupon = shop_coupon::factory()->create();
        $fakeshop_coupon = shop_coupon::factory()->make()->toArray();

        $updatedshop_coupon = $this->shopCouponRepo->update($fakeshop_coupon, $shopCoupon->id);

        $this->assertModelData($fakeshop_coupon, $updatedshop_coupon->toArray());
        $dbshop_coupon = $this->shopCouponRepo->find($shopCoupon->id);
        $this->assertModelData($fakeshop_coupon, $dbshop_coupon->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_coupon()
    {
        $shopCoupon = shop_coupon::factory()->create();

        $resp = $this->shopCouponRepo->delete($shopCoupon->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_coupon::find($shopCoupon->id), 'shop_coupon should not exist in DB');
    }
}
