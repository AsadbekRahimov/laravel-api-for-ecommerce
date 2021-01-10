<?php namespace Tests\Repositories;

use App\Models\tree_shop;
use App\Repositories\tree_shopRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tree_shopRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tree_shopRepository
     */
    protected $treeShopRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->treeShopRepo = \App::make(tree_shopRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tree_shop()
    {
        $treeShop = tree_shop::factory()->make()->toArray();

        $createdtree_shop = $this->treeShopRepo->create($treeShop);

        $createdtree_shop = $createdtree_shop->toArray();
        $this->assertArrayHasKey('id', $createdtree_shop);
        $this->assertNotNull($createdtree_shop['id'], 'Created tree_shop must have id specified');
        $this->assertNotNull(tree_shop::find($createdtree_shop['id']), 'tree_shop with given id must be in DB');
        $this->assertModelData($treeShop, $createdtree_shop);
    }

    /**
     * @test read
     */
    public function test_read_tree_shop()
    {
        $treeShop = tree_shop::factory()->create();

        $dbtree_shop = $this->treeShopRepo->find($treeShop->id);

        $dbtree_shop = $dbtree_shop->toArray();
        $this->assertModelData($treeShop->toArray(), $dbtree_shop);
    }

    /**
     * @test update
     */
    public function test_update_tree_shop()
    {
        $treeShop = tree_shop::factory()->create();
        $faketree_shop = tree_shop::factory()->make()->toArray();

        $updatedtree_shop = $this->treeShopRepo->update($faketree_shop, $treeShop->id);

        $this->assertModelData($faketree_shop, $updatedtree_shop->toArray());
        $dbtree_shop = $this->treeShopRepo->find($treeShop->id);
        $this->assertModelData($faketree_shop, $dbtree_shop->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tree_shop()
    {
        $treeShop = tree_shop::factory()->create();

        $resp = $this->treeShopRepo->delete($treeShop->id);

        $this->assertTrue($resp);
        $this->assertNull(tree_shop::find($treeShop->id), 'tree_shop should not exist in DB');
    }
}
