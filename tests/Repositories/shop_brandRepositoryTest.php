<?php namespace Tests\Repositories;

use App\Models\shop_brand;
use App\Repositories\shop_brandRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_brandRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_brandRepository
     */
    protected $shopBrandRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopBrandRepo = \App::make(shop_brandRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_brand()
    {
        $shopBrand = shop_brand::factory()->make()->toArray();

        $createdshop_brand = $this->shopBrandRepo->create($shopBrand);

        $createdshop_brand = $createdshop_brand->toArray();
        $this->assertArrayHasKey('id', $createdshop_brand);
        $this->assertNotNull($createdshop_brand['id'], 'Created shop_brand must have id specified');
        $this->assertNotNull(shop_brand::find($createdshop_brand['id']), 'shop_brand with given id must be in DB');
        $this->assertModelData($shopBrand, $createdshop_brand);
    }

    /**
     * @test read
     */
    public function test_read_shop_brand()
    {
        $shopBrand = shop_brand::factory()->create();

        $dbshop_brand = $this->shopBrandRepo->find($shopBrand->id);

        $dbshop_brand = $dbshop_brand->toArray();
        $this->assertModelData($shopBrand->toArray(), $dbshop_brand);
    }

    /**
     * @test update
     */
    public function test_update_shop_brand()
    {
        $shopBrand = shop_brand::factory()->create();
        $fakeshop_brand = shop_brand::factory()->make()->toArray();

        $updatedshop_brand = $this->shopBrandRepo->update($fakeshop_brand, $shopBrand->id);

        $this->assertModelData($fakeshop_brand, $updatedshop_brand->toArray());
        $dbshop_brand = $this->shopBrandRepo->find($shopBrand->id);
        $this->assertModelData($fakeshop_brand, $dbshop_brand->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_brand()
    {
        $shopBrand = shop_brand::factory()->create();

        $resp = $this->shopBrandRepo->delete($shopBrand->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_brand::find($shopBrand->id), 'shop_brand should not exist in DB');
    }
}
