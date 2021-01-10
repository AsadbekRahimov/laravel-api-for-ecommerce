<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_option;

class shop_optionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_option()
    {
        $shopOption = shop_option::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_options', $shopOption
        );

        $this->assertApiResponse($shopOption);
    }

    /**
     * @test
     */
    public function test_read_shop_option()
    {
        $shopOption = shop_option::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_options/'.$shopOption->id
        );

        $this->assertApiResponse($shopOption->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_option()
    {
        $shopOption = shop_option::factory()->create();
        $editedshop_option = shop_option::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_options/'.$shopOption->id,
            $editedshop_option
        );

        $this->assertApiResponse($editedshop_option);
    }

    /**
     * @test
     */
    public function test_delete_shop_option()
    {
        $shopOption = shop_option::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_options/'.$shopOption->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_options/'.$shopOption->id
        );

        $this->response->assertStatus(404);
    }
}
