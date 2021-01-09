<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_order;

class calls_orderApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_order()
    {
        $callsOrder = calls_order::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_orders', $callsOrder
        );

        $this->assertApiResponse($callsOrder);
    }

    /**
     * @test
     */
    public function test_read_calls_order()
    {
        $callsOrder = calls_order::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_orders/'.$callsOrder->id
        );

        $this->assertApiResponse($callsOrder->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_order()
    {
        $callsOrder = calls_order::factory()->create();
        $editedcalls_order = calls_order::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_orders/'.$callsOrder->id,
            $editedcalls_order
        );

        $this->assertApiResponse($editedcalls_order);
    }

    /**
     * @test
     */
    public function test_delete_calls_order()
    {
        $callsOrder = calls_order::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_orders/'.$callsOrder->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_orders/'.$callsOrder->id
        );

        $this->response->assertStatus(404);
    }
}
