<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\govs_position;

class govs_positionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_govs_position()
    {
        $govsPosition = govs_position::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/govs_positions', $govsPosition
        );

        $this->assertApiResponse($govsPosition);
    }

    /**
     * @test
     */
    public function test_read_govs_position()
    {
        $govsPosition = govs_position::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/govs_positions/'.$govsPosition->id
        );

        $this->assertApiResponse($govsPosition->toArray());
    }

    /**
     * @test
     */
    public function test_update_govs_position()
    {
        $govsPosition = govs_position::factory()->create();
        $editedgovs_position = govs_position::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/govs_positions/'.$govsPosition->id,
            $editedgovs_position
        );

        $this->assertApiResponse($editedgovs_position);
    }

    /**
     * @test
     */
    public function test_delete_govs_position()
    {
        $govsPosition = govs_position::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/govs_positions/'.$govsPosition->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/govs_positions/'.$govsPosition->id
        );

        $this->response->assertStatus(404);
    }
}
