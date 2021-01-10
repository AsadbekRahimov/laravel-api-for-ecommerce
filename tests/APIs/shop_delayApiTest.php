<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_delay;

class shop_delayApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_delay()
    {
        $shopDelay = shop_delay::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_delays', $shopDelay
        );

        $this->assertApiResponse($shopDelay);
    }

    /**
     * @test
     */
    public function test_read_shop_delay()
    {
        $shopDelay = shop_delay::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_delays/'.$shopDelay->id
        );

        $this->assertApiResponse($shopDelay->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_delay()
    {
        $shopDelay = shop_delay::factory()->create();
        $editedshop_delay = shop_delay::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_delays/'.$shopDelay->id,
            $editedshop_delay
        );

        $this->assertApiResponse($editedshop_delay);
    }

    /**
     * @test
     */
    public function test_delete_shop_delay()
    {
        $shopDelay = shop_delay::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_delays/'.$shopDelay->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_delays/'.$shopDelay->id
        );

        $this->response->assertStatus(404);
    }
}
