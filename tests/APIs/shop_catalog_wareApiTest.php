<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_catalog_ware;

class shop_catalog_wareApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_catalog_ware()
    {
        $shopCatalogWare = shop_catalog_ware::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_catalog_ware', $shopCatalogWare
        );

        $this->assertApiResponse($shopCatalogWare);
    }

    /**
     * @test
     */
    public function test_read_shop_catalog_ware()
    {
        $shopCatalogWare = shop_catalog_ware::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_catalog_ware/'.$shopCatalogWare->id
        );

        $this->assertApiResponse($shopCatalogWare->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_catalog_ware()
    {
        $shopCatalogWare = shop_catalog_ware::factory()->create();
        $editedshop_catalog_ware = shop_catalog_ware::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_catalog_ware/'.$shopCatalogWare->id,
            $editedshop_catalog_ware
        );

        $this->assertApiResponse($editedshop_catalog_ware);
    }

    /**
     * @test
     */
    public function test_delete_shop_catalog_ware()
    {
        $shopCatalogWare = shop_catalog_ware::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_catalog_ware/'.$shopCatalogWare->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_catalog_ware/'.$shopCatalogWare->id
        );

        $this->response->assertStatus(404);
    }
}
