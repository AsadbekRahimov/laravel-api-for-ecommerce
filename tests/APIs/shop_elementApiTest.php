<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_element;

class shop_elementApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_element()
    {
        $shopElement = shop_element::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_elements', $shopElement
        );

        $this->assertApiResponse($shopElement);
    }

    /**
     * @test
     */
    public function test_read_shop_element()
    {
        $shopElement = shop_element::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_elements/'.$shopElement->id
        );

        $this->assertApiResponse($shopElement->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_element()
    {
        $shopElement = shop_element::factory()->create();
        $editedshop_element = shop_element::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_elements/'.$shopElement->id,
            $editedshop_element
        );

        $this->assertApiResponse($editedshop_element);
    }

    /**
     * @test
     */
    public function test_delete_shop_element()
    {
        $shopElement = shop_element::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_elements/'.$shopElement->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_elements/'.$shopElement->id
        );

        $this->response->assertStatus(404);
    }
}
