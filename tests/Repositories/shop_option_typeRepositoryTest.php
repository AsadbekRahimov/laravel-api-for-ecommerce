<?php namespace Tests\Repositories;

use App\Models\shop_option_type;
use App\Repositories\shop_option_typeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_option_typeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_option_typeRepository
     */
    protected $shopOptionTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopOptionTypeRepo = \App::make(shop_option_typeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_option_type()
    {
        $shopOptionType = shop_option_type::factory()->make()->toArray();

        $createdshop_option_type = $this->shopOptionTypeRepo->create($shopOptionType);

        $createdshop_option_type = $createdshop_option_type->toArray();
        $this->assertArrayHasKey('id', $createdshop_option_type);
        $this->assertNotNull($createdshop_option_type['id'], 'Created shop_option_type must have id specified');
        $this->assertNotNull(shop_option_type::find($createdshop_option_type['id']), 'shop_option_type with given id must be in DB');
        $this->assertModelData($shopOptionType, $createdshop_option_type);
    }

    /**
     * @test read
     */
    public function test_read_shop_option_type()
    {
        $shopOptionType = shop_option_type::factory()->create();

        $dbshop_option_type = $this->shopOptionTypeRepo->find($shopOptionType->id);

        $dbshop_option_type = $dbshop_option_type->toArray();
        $this->assertModelData($shopOptionType->toArray(), $dbshop_option_type);
    }

    /**
     * @test update
     */
    public function test_update_shop_option_type()
    {
        $shopOptionType = shop_option_type::factory()->create();
        $fakeshop_option_type = shop_option_type::factory()->make()->toArray();

        $updatedshop_option_type = $this->shopOptionTypeRepo->update($fakeshop_option_type, $shopOptionType->id);

        $this->assertModelData($fakeshop_option_type, $updatedshop_option_type->toArray());
        $dbshop_option_type = $this->shopOptionTypeRepo->find($shopOptionType->id);
        $this->assertModelData($fakeshop_option_type, $dbshop_option_type->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_option_type()
    {
        $shopOptionType = shop_option_type::factory()->create();

        $resp = $this->shopOptionTypeRepo->delete($shopOptionType->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_option_type::find($shopOptionType->id), 'shop_option_type should not exist in DB');
    }
}
