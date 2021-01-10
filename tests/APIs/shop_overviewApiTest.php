<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_overview;

class shop_overviewApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_overview()
    {
        $shopOverview = shop_overview::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_overviews', $shopOverview
        );

        $this->assertApiResponse($shopOverview);
    }

    /**
     * @test
     */
    public function test_read_shop_overview()
    {
        $shopOverview = shop_overview::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_overviews/'.$shopOverview->id
        );

        $this->assertApiResponse($shopOverview->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_overview()
    {
        $shopOverview = shop_overview::factory()->create();
        $editedshop_overview = shop_overview::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_overviews/'.$shopOverview->id,
            $editedshop_overview
        );

        $this->assertApiResponse($editedshop_overview);
    }

    /**
     * @test
     */
    public function test_delete_shop_overview()
    {
        $shopOverview = shop_overview::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_overviews/'.$shopOverview->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_overviews/'.$shopOverview->id
        );

        $this->response->assertStatus(404);
    }
}
