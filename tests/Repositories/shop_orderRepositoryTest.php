<?php namespace Tests\Repositories;

use App\Models\shop_order;
use App\Repositories\shop_orderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_orderRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_orderRepository
     */
    protected $shopOrderRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopOrderRepo = \App::make(shop_orderRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_order()
    {
        $shopOrder = shop_order::factory()->make()->toArray();

        $createdshop_order = $this->shopOrderRepo->create($shopOrder);

        $createdshop_order = $createdshop_order->toArray();
        $this->assertArrayHasKey('id', $createdshop_order);
        $this->assertNotNull($createdshop_order['id'], 'Created shop_order must have id specified');
        $this->assertNotNull(shop_order::find($createdshop_order['id']), 'shop_order with given id must be in DB');
        $this->assertModelData($shopOrder, $createdshop_order);
    }

    /**
     * @test read
     */
    public function test_read_shop_order()
    {
        $shopOrder = shop_order::factory()->create();

        $dbshop_order = $this->shopOrderRepo->find($shopOrder->id);

        $dbshop_order = $dbshop_order->toArray();
        $this->assertModelData($shopOrder->toArray(), $dbshop_order);
    }

    /**
     * @test update
     */
    public function test_update_shop_order()
    {
        $shopOrder = shop_order::factory()->create();
        $fakeshop_order = shop_order::factory()->make()->toArray();

        $updatedshop_order = $this->shopOrderRepo->update($fakeshop_order, $shopOrder->id);

        $this->assertModelData($fakeshop_order, $updatedshop_order->toArray());
        $dbshop_order = $this->shopOrderRepo->find($shopOrder->id);
        $this->assertModelData($fakeshop_order, $dbshop_order->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_order()
    {
        $shopOrder = shop_order::factory()->create();

        $resp = $this->shopOrderRepo->delete($shopOrder->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_order::find($shopOrder->id), 'shop_order should not exist in DB');
    }
}
