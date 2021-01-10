<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_banner;

class shop_bannerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_banner()
    {
        $shopBanner = shop_banner::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_banners', $shopBanner
        );

        $this->assertApiResponse($shopBanner);
    }

    /**
     * @test
     */
    public function test_read_shop_banner()
    {
        $shopBanner = shop_banner::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_banners/'.$shopBanner->id
        );

        $this->assertApiResponse($shopBanner->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_banner()
    {
        $shopBanner = shop_banner::factory()->create();
        $editedshop_banner = shop_banner::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_banners/'.$shopBanner->id,
            $editedshop_banner
        );

        $this->assertApiResponse($editedshop_banner);
    }

    /**
     * @test
     */
    public function test_delete_shop_banner()
    {
        $shopBanner = shop_banner::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_banners/'.$shopBanner->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_banners/'.$shopBanner->id
        );

        $this->response->assertStatus(404);
    }
}
