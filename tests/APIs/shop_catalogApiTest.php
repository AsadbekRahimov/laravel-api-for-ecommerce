<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_catalog;

class shop_catalogApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_catalog()
    {
        $shopCatalog = shop_catalog::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_catalogs', $shopCatalog
        );

        $this->assertApiResponse($shopCatalog);
    }

    /**
     * @test
     */
    public function test_read_shop_catalog()
    {
        $shopCatalog = shop_catalog::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_catalogs/'.$shopCatalog->id
        );

        $this->assertApiResponse($shopCatalog->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_catalog()
    {
        $shopCatalog = shop_catalog::factory()->create();
        $editedshop_catalog = shop_catalog::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_catalogs/'.$shopCatalog->id,
            $editedshop_catalog
        );

        $this->assertApiResponse($editedshop_catalog);
    }

    /**
     * @test
     */
    public function test_delete_shop_catalog()
    {
        $shopCatalog = shop_catalog::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_catalogs/'.$shopCatalog->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_catalogs/'.$shopCatalog->id
        );

        $this->response->assertStatus(404);
    }
}
