<?php namespace Tests\Repositories;

use App\Models\shop_product;
use App\Repositories\shop_productRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_productRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_productRepository
     */
    protected $shopProductRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopProductRepo = \App::make(shop_productRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_product()
    {
        $shopProduct = shop_product::factory()->make()->toArray();

        $createdshop_product = $this->shopProductRepo->create($shopProduct);

        $createdshop_product = $createdshop_product->toArray();
        $this->assertArrayHasKey('id', $createdshop_product);
        $this->assertNotNull($createdshop_product['id'], 'Created shop_product must have id specified');
        $this->assertNotNull(shop_product::find($createdshop_product['id']), 'shop_product with given id must be in DB');
        $this->assertModelData($shopProduct, $createdshop_product);
    }

    /**
     * @test read
     */
    public function test_read_shop_product()
    {
        $shopProduct = shop_product::factory()->create();

        $dbshop_product = $this->shopProductRepo->find($shopProduct->id);

        $dbshop_product = $dbshop_product->toArray();
        $this->assertModelData($shopProduct->toArray(), $dbshop_product);
    }

    /**
     * @test update
     */
    public function test_update_shop_product()
    {
        $shopProduct = shop_product::factory()->create();
        $fakeshop_product = shop_product::factory()->make()->toArray();

        $updatedshop_product = $this->shopProductRepo->update($fakeshop_product, $shopProduct->id);

        $this->assertModelData($fakeshop_product, $updatedshop_product->toArray());
        $dbshop_product = $this->shopProductRepo->find($shopProduct->id);
        $this->assertModelData($fakeshop_product, $dbshop_product->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_product()
    {
        $shopProduct = shop_product::factory()->create();

        $resp = $this->shopProductRepo->delete($shopProduct->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_product::find($shopProduct->id), 'shop_product should not exist in DB');
    }
}
