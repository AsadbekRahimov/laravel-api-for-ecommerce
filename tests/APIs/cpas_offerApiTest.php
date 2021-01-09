<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cpas_offer;

class cpas_offerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cpas_offer()
    {
        $cpasOffer = cpas_offer::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cpas_offers', $cpasOffer
        );

        $this->assertApiResponse($cpasOffer);
    }

    /**
     * @test
     */
    public function test_read_cpas_offer()
    {
        $cpasOffer = cpas_offer::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cpas_offers/'.$cpasOffer->id
        );

        $this->assertApiResponse($cpasOffer->toArray());
    }

    /**
     * @test
     */
    public function test_update_cpas_offer()
    {
        $cpasOffer = cpas_offer::factory()->create();
        $editedcpas_offer = cpas_offer::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cpas_offers/'.$cpasOffer->id,
            $editedcpas_offer
        );

        $this->assertApiResponse($editedcpas_offer);
    }

    /**
     * @test
     */
    public function test_delete_cpas_offer()
    {
        $cpasOffer = cpas_offer::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cpas_offers/'.$cpasOffer->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cpas_offers/'.$cpasOffer->id
        );

        $this->response->assertStatus(404);
    }
}
