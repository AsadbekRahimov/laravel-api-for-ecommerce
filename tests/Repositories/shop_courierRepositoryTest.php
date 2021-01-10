<?php namespace Tests\Repositories;

use App\Models\shop_courier;
use App\Repositories\shop_courierRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_courierRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_courierRepository
     */
    protected $shopCourierRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopCourierRepo = \App::make(shop_courierRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_courier()
    {
        $shopCourier = shop_courier::factory()->make()->toArray();

        $createdshop_courier = $this->shopCourierRepo->create($shopCourier);

        $createdshop_courier = $createdshop_courier->toArray();
        $this->assertArrayHasKey('id', $createdshop_courier);
        $this->assertNotNull($createdshop_courier['id'], 'Created shop_courier must have id specified');
        $this->assertNotNull(shop_courier::find($createdshop_courier['id']), 'shop_courier with given id must be in DB');
        $this->assertModelData($shopCourier, $createdshop_courier);
    }

    /**
     * @test read
     */
    public function test_read_shop_courier()
    {
        $shopCourier = shop_courier::factory()->create();

        $dbshop_courier = $this->shopCourierRepo->find($shopCourier->id);

        $dbshop_courier = $dbshop_courier->toArray();
        $this->assertModelData($shopCourier->toArray(), $dbshop_courier);
    }

    /**
     * @test update
     */
    public function test_update_shop_courier()
    {
        $shopCourier = shop_courier::factory()->create();
        $fakeshop_courier = shop_courier::factory()->make()->toArray();

        $updatedshop_courier = $this->shopCourierRepo->update($fakeshop_courier, $shopCourier->id);

        $this->assertModelData($fakeshop_courier, $updatedshop_courier->toArray());
        $dbshop_courier = $this->shopCourierRepo->find($shopCourier->id);
        $this->assertModelData($fakeshop_courier, $dbshop_courier->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_courier()
    {
        $shopCourier = shop_courier::factory()->create();

        $resp = $this->shopCourierRepo->delete($shopCourier->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_courier::find($shopCourier->id), 'shop_courier should not exist in DB');
    }
}
