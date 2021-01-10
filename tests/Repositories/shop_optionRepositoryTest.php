<?php namespace Tests\Repositories;

use App\Models\shop_option;
use App\Repositories\shop_optionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_optionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_optionRepository
     */
    protected $shopOptionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopOptionRepo = \App::make(shop_optionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_option()
    {
        $shopOption = shop_option::factory()->make()->toArray();

        $createdshop_option = $this->shopOptionRepo->create($shopOption);

        $createdshop_option = $createdshop_option->toArray();
        $this->assertArrayHasKey('id', $createdshop_option);
        $this->assertNotNull($createdshop_option['id'], 'Created shop_option must have id specified');
        $this->assertNotNull(shop_option::find($createdshop_option['id']), 'shop_option with given id must be in DB');
        $this->assertModelData($shopOption, $createdshop_option);
    }

    /**
     * @test read
     */
    public function test_read_shop_option()
    {
        $shopOption = shop_option::factory()->create();

        $dbshop_option = $this->shopOptionRepo->find($shopOption->id);

        $dbshop_option = $dbshop_option->toArray();
        $this->assertModelData($shopOption->toArray(), $dbshop_option);
    }

    /**
     * @test update
     */
    public function test_update_shop_option()
    {
        $shopOption = shop_option::factory()->create();
        $fakeshop_option = shop_option::factory()->make()->toArray();

        $updatedshop_option = $this->shopOptionRepo->update($fakeshop_option, $shopOption->id);

        $this->assertModelData($fakeshop_option, $updatedshop_option->toArray());
        $dbshop_option = $this->shopOptionRepo->find($shopOption->id);
        $this->assertModelData($fakeshop_option, $dbshop_option->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_option()
    {
        $shopOption = shop_option::factory()->create();

        $resp = $this->shopOptionRepo->delete($shopOption->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_option::find($shopOption->id), 'shop_option should not exist in DB');
    }
}
