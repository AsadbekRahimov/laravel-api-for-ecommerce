<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_shipment;

class shop_shipmentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_shipment()
    {
        $shopShipment = shop_shipment::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_shipments', $shopShipment
        );

        $this->assertApiResponse($shopShipment);
    }

    /**
     * @test
     */
    public function test_read_shop_shipment()
    {
        $shopShipment = shop_shipment::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_shipments/'.$shopShipment->id
        );

        $this->assertApiResponse($shopShipment->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_shipment()
    {
        $shopShipment = shop_shipment::factory()->create();
        $editedshop_shipment = shop_shipment::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_shipments/'.$shopShipment->id,
            $editedshop_shipment
        );

        $this->assertApiResponse($editedshop_shipment);
    }

    /**
     * @test
     */
    public function test_delete_shop_shipment()
    {
        $shopShipment = shop_shipment::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_shipments/'.$shopShipment->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_shipments/'.$shopShipment->id
        );

        $this->response->assertStatus(404);
    }
}
