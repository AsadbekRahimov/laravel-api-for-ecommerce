<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_channel;

class shop_channelApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_channel()
    {
        $shopChannel = shop_channel::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_channels', $shopChannel
        );

        $this->assertApiResponse($shopChannel);
    }

    /**
     * @test
     */
    public function test_read_shop_channel()
    {
        $shopChannel = shop_channel::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_channels/'.$shopChannel->id
        );

        $this->assertApiResponse($shopChannel->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_channel()
    {
        $shopChannel = shop_channel::factory()->create();
        $editedshop_channel = shop_channel::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_channels/'.$shopChannel->id,
            $editedshop_channel
        );

        $this->assertApiResponse($editedshop_channel);
    }

    /**
     * @test
     */
    public function test_delete_shop_channel()
    {
        $shopChannel = shop_channel::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_channels/'.$shopChannel->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_channels/'.$shopChannel->id
        );

        $this->response->assertStatus(404);
    }
}
