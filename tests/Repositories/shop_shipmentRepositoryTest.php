<?php namespace Tests\Repositories;

use App\Models\shop_shipment;
use App\Repositories\shop_shipmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_shipmentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_shipmentRepository
     */
    protected $shopShipmentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopShipmentRepo = \App::make(shop_shipmentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_shipment()
    {
        $shopShipment = shop_shipment::factory()->make()->toArray();

        $createdshop_shipment = $this->shopShipmentRepo->create($shopShipment);

        $createdshop_shipment = $createdshop_shipment->toArray();
        $this->assertArrayHasKey('id', $createdshop_shipment);
        $this->assertNotNull($createdshop_shipment['id'], 'Created shop_shipment must have id specified');
        $this->assertNotNull(shop_shipment::find($createdshop_shipment['id']), 'shop_shipment with given id must be in DB');
        $this->assertModelData($shopShipment, $createdshop_shipment);
    }

    /**
     * @test read
     */
    public function test_read_shop_shipment()
    {
        $shopShipment = shop_shipment::factory()->create();

        $dbshop_shipment = $this->shopShipmentRepo->find($shopShipment->id);

        $dbshop_shipment = $dbshop_shipment->toArray();
        $this->assertModelData($shopShipment->toArray(), $dbshop_shipment);
    }

    /**
     * @test update
     */
    public function test_update_shop_shipment()
    {
        $shopShipment = shop_shipment::factory()->create();
        $fakeshop_shipment = shop_shipment::factory()->make()->toArray();

        $updatedshop_shipment = $this->shopShipmentRepo->update($fakeshop_shipment, $shopShipment->id);

        $this->assertModelData($fakeshop_shipment, $updatedshop_shipment->toArray());
        $dbshop_shipment = $this->shopShipmentRepo->find($shopShipment->id);
        $this->assertModelData($fakeshop_shipment, $dbshop_shipment->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_shipment()
    {
        $shopShipment = shop_shipment::factory()->create();

        $resp = $this->shopShipmentRepo->delete($shopShipment->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_shipment::find($shopShipment->id), 'shop_shipment should not exist in DB');
    }
}
