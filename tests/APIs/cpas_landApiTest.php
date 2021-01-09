<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cpas_land;

class cpas_landApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cpas_land()
    {
        $cpasLand = cpas_land::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cpas_lands', $cpasLand
        );

        $this->assertApiResponse($cpasLand);
    }

    /**
     * @test
     */
    public function test_read_cpas_land()
    {
        $cpasLand = cpas_land::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cpas_lands/'.$cpasLand->id
        );

        $this->assertApiResponse($cpasLand->toArray());
    }

    /**
     * @test
     */
    public function test_update_cpas_land()
    {
        $cpasLand = cpas_land::factory()->create();
        $editedcpas_land = cpas_land::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cpas_lands/'.$cpasLand->id,
            $editedcpas_land
        );

        $this->assertApiResponse($editedcpas_land);
    }

    /**
     * @test
     */
    public function test_delete_cpas_land()
    {
        $cpasLand = cpas_land::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cpas_lands/'.$cpasLand->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cpas_lands/'.$cpasLand->id
        );

        $this->response->assertStatus(404);
    }
}
