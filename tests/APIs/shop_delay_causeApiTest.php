<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_delay_cause;

class shop_delay_causeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_delay_cause()
    {
        $shopDelayCause = shop_delay_cause::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_delay_causes', $shopDelayCause
        );

        $this->assertApiResponse($shopDelayCause);
    }

    /**
     * @test
     */
    public function test_read_shop_delay_cause()
    {
        $shopDelayCause = shop_delay_cause::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_delay_causes/'.$shopDelayCause->id
        );

        $this->assertApiResponse($shopDelayCause->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_delay_cause()
    {
        $shopDelayCause = shop_delay_cause::factory()->create();
        $editedshop_delay_cause = shop_delay_cause::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_delay_causes/'.$shopDelayCause->id,
            $editedshop_delay_cause
        );

        $this->assertApiResponse($editedshop_delay_cause);
    }

    /**
     * @test
     */
    public function test_delete_shop_delay_cause()
    {
        $shopDelayCause = shop_delay_cause::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_delay_causes/'.$shopDelayCause->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_delay_causes/'.$shopDelayCause->id
        );

        $this->response->assertStatus(404);
    }
}
