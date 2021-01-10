<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_reject_cause;

class shop_reject_causeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_reject_cause()
    {
        $shopRejectCause = shop_reject_cause::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_reject_causes', $shopRejectCause
        );

        $this->assertApiResponse($shopRejectCause);
    }

    /**
     * @test
     */
    public function test_read_shop_reject_cause()
    {
        $shopRejectCause = shop_reject_cause::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_reject_causes/'.$shopRejectCause->id
        );

        $this->assertApiResponse($shopRejectCause->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_reject_cause()
    {
        $shopRejectCause = shop_reject_cause::factory()->create();
        $editedshop_reject_cause = shop_reject_cause::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_reject_causes/'.$shopRejectCause->id,
            $editedshop_reject_cause
        );

        $this->assertApiResponse($editedshop_reject_cause);
    }

    /**
     * @test
     */
    public function test_delete_shop_reject_cause()
    {
        $shopRejectCause = shop_reject_cause::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_reject_causes/'.$shopRejectCause->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_reject_causes/'.$shopRejectCause->id
        );

        $this->response->assertStatus(404);
    }
}
