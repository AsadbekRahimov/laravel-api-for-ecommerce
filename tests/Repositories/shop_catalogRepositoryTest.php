<?php namespace Tests\Repositories;

use App\Models\shop_catalog;
use App\Repositories\shop_catalogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_catalogRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_catalogRepository
     */
    protected $shopCatalogRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopCatalogRepo = \App::make(shop_catalogRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_catalog()
    {
        $shopCatalog = shop_catalog::factory()->make()->toArray();

        $createdshop_catalog = $this->shopCatalogRepo->create($shopCatalog);

        $createdshop_catalog = $createdshop_catalog->toArray();
        $this->assertArrayHasKey('id', $createdshop_catalog);
        $this->assertNotNull($createdshop_catalog['id'], 'Created shop_catalog must have id specified');
        $this->assertNotNull(shop_catalog::find($createdshop_catalog['id']), 'shop_catalog with given id must be in DB');
        $this->assertModelData($shopCatalog, $createdshop_catalog);
    }

    /**
     * @test read
     */
    public function test_read_shop_catalog()
    {
        $shopCatalog = shop_catalog::factory()->create();

        $dbshop_catalog = $this->shopCatalogRepo->find($shopCatalog->id);

        $dbshop_catalog = $dbshop_catalog->toArray();
        $this->assertModelData($shopCatalog->toArray(), $dbshop_catalog);
    }

    /**
     * @test update
     */
    public function test_update_shop_catalog()
    {
        $shopCatalog = shop_catalog::factory()->create();
        $fakeshop_catalog = shop_catalog::factory()->make()->toArray();

        $updatedshop_catalog = $this->shopCatalogRepo->update($fakeshop_catalog, $shopCatalog->id);

        $this->assertModelData($fakeshop_catalog, $updatedshop_catalog->toArray());
        $dbshop_catalog = $this->shopCatalogRepo->find($shopCatalog->id);
        $this->assertModelData($fakeshop_catalog, $dbshop_catalog->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_catalog()
    {
        $shopCatalog = shop_catalog::factory()->create();

        $resp = $this->shopCatalogRepo->delete($shopCatalog->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_catalog::find($shopCatalog->id), 'shop_catalog should not exist in DB');
    }
}
