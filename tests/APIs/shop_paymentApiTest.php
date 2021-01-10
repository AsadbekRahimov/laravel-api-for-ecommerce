<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_payment;

class shop_paymentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_payment()
    {
        $shopPayment = shop_payment::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_payments', $shopPayment
        );

        $this->assertApiResponse($shopPayment);
    }

    /**
     * @test
     */
    public function test_read_shop_payment()
    {
        $shopPayment = shop_payment::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_payments/'.$shopPayment->id
        );

        $this->assertApiResponse($shopPayment->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_payment()
    {
        $shopPayment = shop_payment::factory()->create();
        $editedshop_payment = shop_payment::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_payments/'.$shopPayment->id,
            $editedshop_payment
        );

        $this->assertApiResponse($editedshop_payment);
    }

    /**
     * @test
     */
    public function test_delete_shop_payment()
    {
        $shopPayment = shop_payment::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_payments/'.$shopPayment->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_payments/'.$shopPayment->id
        );

        $this->response->assertStatus(404);
    }
}
