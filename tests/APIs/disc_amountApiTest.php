<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\disc_amount;

class disc_amountApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_disc_amount()
    {
        $discAmount = disc_amount::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/disc_amounts', $discAmount
        );

        $this->assertApiResponse($discAmount);
    }

    /**
     * @test
     */
    public function test_read_disc_amount()
    {
        $discAmount = disc_amount::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/disc_amounts/'.$discAmount->id
        );

        $this->assertApiResponse($discAmount->toArray());
    }

    /**
     * @test
     */
    public function test_update_disc_amount()
    {
        $discAmount = disc_amount::factory()->create();
        $editeddisc_amount = disc_amount::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/disc_amounts/'.$discAmount->id,
            $editeddisc_amount
        );

        $this->assertApiResponse($editeddisc_amount);
    }

    /**
     * @test
     */
    public function test_delete_disc_amount()
    {
        $discAmount = disc_amount::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/disc_amounts/'.$discAmount->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/disc_amounts/'.$discAmount->id
        );

        $this->response->assertStatus(404);
    }
}
