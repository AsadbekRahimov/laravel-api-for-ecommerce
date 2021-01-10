<?php namespace Tests\Repositories;

use App\Models\shop_banner;
use App\Repositories\shop_bannerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_bannerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_bannerRepository
     */
    protected $shopBannerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopBannerRepo = \App::make(shop_bannerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_banner()
    {
        $shopBanner = shop_banner::factory()->make()->toArray();

        $createdshop_banner = $this->shopBannerRepo->create($shopBanner);

        $createdshop_banner = $createdshop_banner->toArray();
        $this->assertArrayHasKey('id', $createdshop_banner);
        $this->assertNotNull($createdshop_banner['id'], 'Created shop_banner must have id specified');
        $this->assertNotNull(shop_banner::find($createdshop_banner['id']), 'shop_banner with given id must be in DB');
        $this->assertModelData($shopBanner, $createdshop_banner);
    }

    /**
     * @test read
     */
    public function test_read_shop_banner()
    {
        $shopBanner = shop_banner::factory()->create();

        $dbshop_banner = $this->shopBannerRepo->find($shopBanner->id);

        $dbshop_banner = $dbshop_banner->toArray();
        $this->assertModelData($shopBanner->toArray(), $dbshop_banner);
    }

    /**
     * @test update
     */
    public function test_update_shop_banner()
    {
        $shopBanner = shop_banner::factory()->create();
        $fakeshop_banner = shop_banner::factory()->make()->toArray();

        $updatedshop_banner = $this->shopBannerRepo->update($fakeshop_banner, $shopBanner->id);

        $this->assertModelData($fakeshop_banner, $updatedshop_banner->toArray());
        $dbshop_banner = $this->shopBannerRepo->find($shopBanner->id);
        $this->assertModelData($fakeshop_banner, $dbshop_banner->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_banner()
    {
        $shopBanner = shop_banner::factory()->create();

        $resp = $this->shopBannerRepo->delete($shopBanner->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_banner::find($shopBanner->id), 'shop_banner should not exist in DB');
    }
}
