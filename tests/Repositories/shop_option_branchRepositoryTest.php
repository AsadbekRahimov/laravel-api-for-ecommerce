<?php namespace Tests\Repositories;

use App\Models\shop_option_branch;
use App\Repositories\shop_option_branchRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_option_branchRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_option_branchRepository
     */
    protected $shopOptionBranchRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopOptionBranchRepo = \App::make(shop_option_branchRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_option_branch()
    {
        $shopOptionBranch = shop_option_branch::factory()->make()->toArray();

        $createdshop_option_branch = $this->shopOptionBranchRepo->create($shopOptionBranch);

        $createdshop_option_branch = $createdshop_option_branch->toArray();
        $this->assertArrayHasKey('id', $createdshop_option_branch);
        $this->assertNotNull($createdshop_option_branch['id'], 'Created shop_option_branch must have id specified');
        $this->assertNotNull(shop_option_branch::find($createdshop_option_branch['id']), 'shop_option_branch with given id must be in DB');
        $this->assertModelData($shopOptionBranch, $createdshop_option_branch);
    }

    /**
     * @test read
     */
    public function test_read_shop_option_branch()
    {
        $shopOptionBranch = shop_option_branch::factory()->create();

        $dbshop_option_branch = $this->shopOptionBranchRepo->find($shopOptionBranch->id);

        $dbshop_option_branch = $dbshop_option_branch->toArray();
        $this->assertModelData($shopOptionBranch->toArray(), $dbshop_option_branch);
    }

    /**
     * @test update
     */
    public function test_update_shop_option_branch()
    {
        $shopOptionBranch = shop_option_branch::factory()->create();
        $fakeshop_option_branch = shop_option_branch::factory()->make()->toArray();

        $updatedshop_option_branch = $this->shopOptionBranchRepo->update($fakeshop_option_branch, $shopOptionBranch->id);

        $this->assertModelData($fakeshop_option_branch, $updatedshop_option_branch->toArray());
        $dbshop_option_branch = $this->shopOptionBranchRepo->find($shopOptionBranch->id);
        $this->assertModelData($fakeshop_option_branch, $dbshop_option_branch->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_option_branch()
    {
        $shopOptionBranch = shop_option_branch::factory()->create();

        $resp = $this->shopOptionBranchRepo->delete($shopOptionBranch->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_option_branch::find($shopOptionBranch->id), 'shop_option_branch should not exist in DB');
    }
}
