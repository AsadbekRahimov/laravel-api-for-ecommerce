<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\maps_navigate;

class maps_navigateApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_maps_navigate()
    {
        $mapsNavigate = maps_navigate::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/maps_navigates', $mapsNavigate
        );

        $this->assertApiResponse($mapsNavigate);
    }

    /**
     * @test
     */
    public function test_read_maps_navigate()
    {
        $mapsNavigate = maps_navigate::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/maps_navigates/'.$mapsNavigate->id
        );

        $this->assertApiResponse($mapsNavigate->toArray());
    }

    /**
     * @test
     */
    public function test_update_maps_navigate()
    {
        $mapsNavigate = maps_navigate::factory()->create();
        $editedmaps_navigate = maps_navigate::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/maps_navigates/'.$mapsNavigate->id,
            $editedmaps_navigate
        );

        $this->assertApiResponse($editedmaps_navigate);
    }

    /**
     * @test
     */
    public function test_delete_maps_navigate()
    {
        $mapsNavigate = maps_navigate::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/maps_navigates/'.$mapsNavigate->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/maps_navigates/'.$mapsNavigate->id
        );

        $this->response->assertStatus(404);
    }
}
