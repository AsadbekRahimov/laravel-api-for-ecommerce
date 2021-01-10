<?php namespace Tests\Repositories;

use App\Models\shop_order_item;
use App\Repositories\shop_order_itemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_order_itemRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_order_itemRepository
     */
    protected $shopOrderItemRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopOrderItemRepo = \App::make(shop_order_itemRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_order_item()
    {
        $shopOrderItem = shop_order_item::factory()->make()->toArray();

        $createdshop_order_item = $this->shopOrderItemRepo->create($shopOrderItem);

        $createdshop_order_item = $createdshop_order_item->toArray();
        $this->assertArrayHasKey('id', $createdshop_order_item);
        $this->assertNotNull($createdshop_order_item['id'], 'Created shop_order_item must have id specified');
        $this->assertNotNull(shop_order_item::find($createdshop_order_item['id']), 'shop_order_item with given id must be in DB');
        $this->assertModelData($shopOrderItem, $createdshop_order_item);
    }

    /**
     * @test read
     */
    public function test_read_shop_order_item()
    {
        $shopOrderItem = shop_order_item::factory()->create();

        $dbshop_order_item = $this->shopOrderItemRepo->find($shopOrderItem->id);

        $dbshop_order_item = $dbshop_order_item->toArray();
        $this->assertModelData($shopOrderItem->toArray(), $dbshop_order_item);
    }

    /**
     * @test update
     */
    public function test_update_shop_order_item()
    {
        $shopOrderItem = shop_order_item::factory()->create();
        $fakeshop_order_item = shop_order_item::factory()->make()->toArray();

        $updatedshop_order_item = $this->shopOrderItemRepo->update($fakeshop_order_item, $shopOrderItem->id);

        $this->assertModelData($fakeshop_order_item, $updatedshop_order_item->toArray());
        $dbshop_order_item = $this->shopOrderItemRepo->find($shopOrderItem->id);
        $this->assertModelData($fakeshop_order_item, $dbshop_order_item->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_order_item()
    {
        $shopOrderItem = shop_order_item::factory()->create();

        $resp = $this->shopOrderItemRepo->delete($shopOrderItem->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_order_item::find($shopOrderItem->id), 'shop_order_item should not exist in DB');
    }
}
