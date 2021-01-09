<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cpas_offer_item;

class cpas_offer_itemApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cpas_offer_item()
    {
        $cpasOfferItem = cpas_offer_item::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cpas_offer_items', $cpasOfferItem
        );

        $this->assertApiResponse($cpasOfferItem);
    }

    /**
     * @test
     */
    public function test_read_cpas_offer_item()
    {
        $cpasOfferItem = cpas_offer_item::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cpas_offer_items/'.$cpasOfferItem->id
        );

        $this->assertApiResponse($cpasOfferItem->toArray());
    }

    /**
     * @test
     */
    public function test_update_cpas_offer_item()
    {
        $cpasOfferItem = cpas_offer_item::factory()->create();
        $editedcpas_offer_item = cpas_offer_item::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cpas_offer_items/'.$cpasOfferItem->id,
            $editedcpas_offer_item
        );

        $this->assertApiResponse($editedcpas_offer_item);
    }

    /**
     * @test
     */
    public function test_delete_cpas_offer_item()
    {
        $cpasOfferItem = cpas_offer_item::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cpas_offer_items/'.$cpasOfferItem->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cpas_offer_items/'.$cpasOfferItem->id
        );

        $this->response->assertStatus(404);
    }
}
