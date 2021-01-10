<?php namespace Tests\Repositories;

use App\Models\shop_overview;
use App\Repositories\shop_overviewRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_overviewRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_overviewRepository
     */
    protected $shopOverviewRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopOverviewRepo = \App::make(shop_overviewRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_overview()
    {
        $shopOverview = shop_overview::factory()->make()->toArray();

        $createdshop_overview = $this->shopOverviewRepo->create($shopOverview);

        $createdshop_overview = $createdshop_overview->toArray();
        $this->assertArrayHasKey('id', $createdshop_overview);
        $this->assertNotNull($createdshop_overview['id'], 'Created shop_overview must have id specified');
        $this->assertNotNull(shop_overview::find($createdshop_overview['id']), 'shop_overview with given id must be in DB');
        $this->assertModelData($shopOverview, $createdshop_overview);
    }

    /**
     * @test read
     */
    public function test_read_shop_overview()
    {
        $shopOverview = shop_overview::factory()->create();

        $dbshop_overview = $this->shopOverviewRepo->find($shopOverview->id);

        $dbshop_overview = $dbshop_overview->toArray();
        $this->assertModelData($shopOverview->toArray(), $dbshop_overview);
    }

    /**
     * @test update
     */
    public function test_update_shop_overview()
    {
        $shopOverview = shop_overview::factory()->create();
        $fakeshop_overview = shop_overview::factory()->make()->toArray();

        $updatedshop_overview = $this->shopOverviewRepo->update($fakeshop_overview, $shopOverview->id);

        $this->assertModelData($fakeshop_overview, $updatedshop_overview->toArray());
        $dbshop_overview = $this->shopOverviewRepo->find($shopOverview->id);
        $this->assertModelData($fakeshop_overview, $dbshop_overview->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_overview()
    {
        $shopOverview = shop_overview::factory()->create();

        $resp = $this->shopOverviewRepo->delete($shopOverview->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_overview::find($shopOverview->id), 'shop_overview should not exist in DB');
    }
}
