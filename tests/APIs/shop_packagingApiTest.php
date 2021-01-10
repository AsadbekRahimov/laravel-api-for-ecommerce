<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_packaging;

class shop_packagingApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_packaging()
    {
        $shopPackaging = shop_packaging::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_packagings', $shopPackaging
        );

        $this->assertApiResponse($shopPackaging);
    }

    /**
     * @test
     */
    public function test_read_shop_packaging()
    {
        $shopPackaging = shop_packaging::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_packagings/'.$shopPackaging->id
        );

        $this->assertApiResponse($shopPackaging->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_packaging()
    {
        $shopPackaging = shop_packaging::factory()->create();
        $editedshop_packaging = shop_packaging::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_packagings/'.$shopPackaging->id,
            $editedshop_packaging
        );

        $this->assertApiResponse($editedshop_packaging);
    }

    /**
     * @test
     */
    public function test_delete_shop_packaging()
    {
        $shopPackaging = shop_packaging::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_packagings/'.$shopPackaging->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_packagings/'.$shopPackaging->id
        );

        $this->response->assertStatus(404);
    }
}
