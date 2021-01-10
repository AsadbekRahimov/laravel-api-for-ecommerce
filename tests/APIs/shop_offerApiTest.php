<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_offer;

class shop_offerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_offer()
    {
        $shopOffer = shop_offer::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_offers', $shopOffer
        );

        $this->assertApiResponse($shopOffer);
    }

    /**
     * @test
     */
    public function test_read_shop_offer()
    {
        $shopOffer = shop_offer::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_offers/'.$shopOffer->id
        );

        $this->assertApiResponse($shopOffer->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_offer()
    {
        $shopOffer = shop_offer::factory()->create();
        $editedshop_offer = shop_offer::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_offers/'.$shopOffer->id,
            $editedshop_offer
        );

        $this->assertApiResponse($editedshop_offer);
    }

    /**
     * @test
     */
    public function test_delete_shop_offer()
    {
        $shopOffer = shop_offer::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_offers/'.$shopOffer->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_offers/'.$shopOffer->id
        );

        $this->response->assertStatus(404);
    }
}
