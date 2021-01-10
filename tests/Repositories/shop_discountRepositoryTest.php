<?php namespace Tests\Repositories;

use App\Models\shop_discount;
use App\Repositories\shop_discountRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_discountRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_discountRepository
     */
    protected $shopDiscountRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopDiscountRepo = \App::make(shop_discountRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_discount()
    {
        $shopDiscount = shop_discount::factory()->make()->toArray();

        $createdshop_discount = $this->shopDiscountRepo->create($shopDiscount);

        $createdshop_discount = $createdshop_discount->toArray();
        $this->assertArrayHasKey('id', $createdshop_discount);
        $this->assertNotNull($createdshop_discount['id'], 'Created shop_discount must have id specified');
        $this->assertNotNull(shop_discount::find($createdshop_discount['id']), 'shop_discount with given id must be in DB');
        $this->assertModelData($shopDiscount, $createdshop_discount);
    }

    /**
     * @test read
     */
    public function test_read_shop_discount()
    {
        $shopDiscount = shop_discount::factory()->create();

        $dbshop_discount = $this->shopDiscountRepo->find($shopDiscount->id);

        $dbshop_discount = $dbshop_discount->toArray();
        $this->assertModelData($shopDiscount->toArray(), $dbshop_discount);
    }

    /**
     * @test update
     */
    public function test_update_shop_discount()
    {
        $shopDiscount = shop_discount::factory()->create();
        $fakeshop_discount = shop_discount::factory()->make()->toArray();

        $updatedshop_discount = $this->shopDiscountRepo->update($fakeshop_discount, $shopDiscount->id);

        $this->assertModelData($fakeshop_discount, $updatedshop_discount->toArray());
        $dbshop_discount = $this->shopDiscountRepo->find($shopDiscount->id);
        $this->assertModelData($fakeshop_discount, $dbshop_discount->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_discount()
    {
        $shopDiscount = shop_discount::factory()->create();

        $resp = $this->shopDiscountRepo->delete($shopDiscount->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_discount::find($shopDiscount->id), 'shop_discount should not exist in DB');
    }
}
