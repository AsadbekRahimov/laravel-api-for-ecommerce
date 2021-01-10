<?php namespace Tests\Repositories;

use App\Models\shop_packaging;
use App\Repositories\shop_packagingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_packagingRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_packagingRepository
     */
    protected $shopPackagingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopPackagingRepo = \App::make(shop_packagingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_packaging()
    {
        $shopPackaging = shop_packaging::factory()->make()->toArray();

        $createdshop_packaging = $this->shopPackagingRepo->create($shopPackaging);

        $createdshop_packaging = $createdshop_packaging->toArray();
        $this->assertArrayHasKey('id', $createdshop_packaging);
        $this->assertNotNull($createdshop_packaging['id'], 'Created shop_packaging must have id specified');
        $this->assertNotNull(shop_packaging::find($createdshop_packaging['id']), 'shop_packaging with given id must be in DB');
        $this->assertModelData($shopPackaging, $createdshop_packaging);
    }

    /**
     * @test read
     */
    public function test_read_shop_packaging()
    {
        $shopPackaging = shop_packaging::factory()->create();

        $dbshop_packaging = $this->shopPackagingRepo->find($shopPackaging->id);

        $dbshop_packaging = $dbshop_packaging->toArray();
        $this->assertModelData($shopPackaging->toArray(), $dbshop_packaging);
    }

    /**
     * @test update
     */
    public function test_update_shop_packaging()
    {
        $shopPackaging = shop_packaging::factory()->create();
        $fakeshop_packaging = shop_packaging::factory()->make()->toArray();

        $updatedshop_packaging = $this->shopPackagingRepo->update($fakeshop_packaging, $shopPackaging->id);

        $this->assertModelData($fakeshop_packaging, $updatedshop_packaging->toArray());
        $dbshop_packaging = $this->shopPackagingRepo->find($shopPackaging->id);
        $this->assertModelData($fakeshop_packaging, $dbshop_packaging->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_packaging()
    {
        $shopPackaging = shop_packaging::factory()->create();

        $resp = $this->shopPackagingRepo->delete($shopPackaging->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_packaging::find($shopPackaging->id), 'shop_packaging should not exist in DB');
    }
}
