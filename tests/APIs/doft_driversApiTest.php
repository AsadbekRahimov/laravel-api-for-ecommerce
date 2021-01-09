<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\doft_drivers;

class doft_driversApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_doft_drivers()
    {
        $doftDrivers = doft_drivers::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/doft_drivers', $doftDrivers
        );

        $this->assertApiResponse($doftDrivers);
    }

    /**
     * @test
     */
    public function test_read_doft_drivers()
    {
        $doftDrivers = doft_drivers::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/doft_drivers/'.$doftDrivers->id
        );

        $this->assertApiResponse($doftDrivers->toArray());
    }

    /**
     * @test
     */
    public function test_update_doft_drivers()
    {
        $doftDrivers = doft_drivers::factory()->create();
        $editeddoft_drivers = doft_drivers::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/doft_drivers/'.$doftDrivers->id,
            $editeddoft_drivers
        );

        $this->assertApiResponse($editeddoft_drivers);
    }

    /**
     * @test
     */
    public function test_delete_doft_drivers()
    {
        $doftDrivers = doft_drivers::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/doft_drivers/'.$doftDrivers->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/doft_drivers/'.$doftDrivers->id
        );

        $this->response->assertStatus(404);
    }
}
