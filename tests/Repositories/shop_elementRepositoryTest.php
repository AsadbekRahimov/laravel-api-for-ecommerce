<?php namespace Tests\Repositories;

use App\Models\shop_element;
use App\Repositories\shop_elementRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_elementRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_elementRepository
     */
    protected $shopElementRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopElementRepo = \App::make(shop_elementRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_element()
    {
        $shopElement = shop_element::factory()->make()->toArray();

        $createdshop_element = $this->shopElementRepo->create($shopElement);

        $createdshop_element = $createdshop_element->toArray();
        $this->assertArrayHasKey('id', $createdshop_element);
        $this->assertNotNull($createdshop_element['id'], 'Created shop_element must have id specified');
        $this->assertNotNull(shop_element::find($createdshop_element['id']), 'shop_element with given id must be in DB');
        $this->assertModelData($shopElement, $createdshop_element);
    }

    /**
     * @test read
     */
    public function test_read_shop_element()
    {
        $shopElement = shop_element::factory()->create();

        $dbshop_element = $this->shopElementRepo->find($shopElement->id);

        $dbshop_element = $dbshop_element->toArray();
        $this->assertModelData($shopElement->toArray(), $dbshop_element);
    }

    /**
     * @test update
     */
    public function test_update_shop_element()
    {
        $shopElement = shop_element::factory()->create();
        $fakeshop_element = shop_element::factory()->make()->toArray();

        $updatedshop_element = $this->shopElementRepo->update($fakeshop_element, $shopElement->id);

        $this->assertModelData($fakeshop_element, $updatedshop_element->toArray());
        $dbshop_element = $this->shopElementRepo->find($shopElement->id);
        $this->assertModelData($fakeshop_element, $dbshop_element->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_element()
    {
        $shopElement = shop_element::factory()->create();

        $resp = $this->shopElementRepo->delete($shopElement->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_element::find($shopElement->id), 'shop_element should not exist in DB');
    }
}
