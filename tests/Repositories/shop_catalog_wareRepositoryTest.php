<?php namespace Tests\Repositories;

use App\Models\shop_catalog_ware;
use App\Repositories\shop_catalog_wareRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_catalog_wareRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_catalog_wareRepository
     */
    protected $shopCatalogWareRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopCatalogWareRepo = \App::make(shop_catalog_wareRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_catalog_ware()
    {
        $shopCatalogWare = shop_catalog_ware::factory()->make()->toArray();

        $createdshop_catalog_ware = $this->shopCatalogWareRepo->create($shopCatalogWare);

        $createdshop_catalog_ware = $createdshop_catalog_ware->toArray();
        $this->assertArrayHasKey('id', $createdshop_catalog_ware);
        $this->assertNotNull($createdshop_catalog_ware['id'], 'Created shop_catalog_ware must have id specified');
        $this->assertNotNull(shop_catalog_ware::find($createdshop_catalog_ware['id']), 'shop_catalog_ware with given id must be in DB');
        $this->assertModelData($shopCatalogWare, $createdshop_catalog_ware);
    }

    /**
     * @test read
     */
    public function test_read_shop_catalog_ware()
    {
        $shopCatalogWare = shop_catalog_ware::factory()->create();

        $dbshop_catalog_ware = $this->shopCatalogWareRepo->find($shopCatalogWare->id);

        $dbshop_catalog_ware = $dbshop_catalog_ware->toArray();
        $this->assertModelData($shopCatalogWare->toArray(), $dbshop_catalog_ware);
    }

    /**
     * @test update
     */
    public function test_update_shop_catalog_ware()
    {
        $shopCatalogWare = shop_catalog_ware::factory()->create();
        $fakeshop_catalog_ware = shop_catalog_ware::factory()->make()->toArray();

        $updatedshop_catalog_ware = $this->shopCatalogWareRepo->update($fakeshop_catalog_ware, $shopCatalogWare->id);

        $this->assertModelData($fakeshop_catalog_ware, $updatedshop_catalog_ware->toArray());
        $dbshop_catalog_ware = $this->shopCatalogWareRepo->find($shopCatalogWare->id);
        $this->assertModelData($fakeshop_catalog_ware, $dbshop_catalog_ware->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_catalog_ware()
    {
        $shopCatalogWare = shop_catalog_ware::factory()->create();

        $resp = $this->shopCatalogWareRepo->delete($shopCatalogWare->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_catalog_ware::find($shopCatalogWare->id), 'shop_catalog_ware should not exist in DB');
    }
}
