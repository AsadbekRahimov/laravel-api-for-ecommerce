<?php namespace Tests\Repositories;

use App\Models\shop_category;
use App\Repositories\shop_categoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_categoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_categoryRepository
     */
    protected $shopCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopCategoryRepo = \App::make(shop_categoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_category()
    {
        $shopCategory = shop_category::factory()->make()->toArray();

        $createdshop_category = $this->shopCategoryRepo->create($shopCategory);

        $createdshop_category = $createdshop_category->toArray();
        $this->assertArrayHasKey('id', $createdshop_category);
        $this->assertNotNull($createdshop_category['id'], 'Created shop_category must have id specified');
        $this->assertNotNull(shop_category::find($createdshop_category['id']), 'shop_category with given id must be in DB');
        $this->assertModelData($shopCategory, $createdshop_category);
    }

    /**
     * @test read
     */
    public function test_read_shop_category()
    {
        $shopCategory = shop_category::factory()->create();

        $dbshop_category = $this->shopCategoryRepo->find($shopCategory->id);

        $dbshop_category = $dbshop_category->toArray();
        $this->assertModelData($shopCategory->toArray(), $dbshop_category);
    }

    /**
     * @test update
     */
    public function test_update_shop_category()
    {
        $shopCategory = shop_category::factory()->create();
        $fakeshop_category = shop_category::factory()->make()->toArray();

        $updatedshop_category = $this->shopCategoryRepo->update($fakeshop_category, $shopCategory->id);

        $this->assertModelData($fakeshop_category, $updatedshop_category->toArray());
        $dbshop_category = $this->shopCategoryRepo->find($shopCategory->id);
        $this->assertModelData($fakeshop_category, $dbshop_category->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_category()
    {
        $shopCategory = shop_category::factory()->create();

        $resp = $this->shopCategoryRepo->delete($shopCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_category::find($shopCategory->id), 'shop_category should not exist in DB');
    }
}
