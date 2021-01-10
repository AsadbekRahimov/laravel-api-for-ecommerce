<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_option_type;

class shop_option_typeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_option_type()
    {
        $shopOptionType = shop_option_type::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_option_types', $shopOptionType
        );

        $this->assertApiResponse($shopOptionType);
    }

    /**
     * @test
     */
    public function test_read_shop_option_type()
    {
        $shopOptionType = shop_option_type::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_option_types/'.$shopOptionType->id
        );

        $this->assertApiResponse($shopOptionType->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_option_type()
    {
        $shopOptionType = shop_option_type::factory()->create();
        $editedshop_option_type = shop_option_type::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_option_types/'.$shopOptionType->id,
            $editedshop_option_type
        );

        $this->assertApiResponse($editedshop_option_type);
    }

    /**
     * @test
     */
    public function test_delete_shop_option_type()
    {
        $shopOptionType = shop_option_type::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_option_types/'.$shopOptionType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_option_types/'.$shopOptionType->id
        );

        $this->response->assertStatus(404);
    }
}
