<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\doft_shippers;

class doft_shippersApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_doft_shippers()
    {
        $doftShippers = doft_shippers::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/doft_shippers', $doftShippers
        );

        $this->assertApiResponse($doftShippers);
    }

    /**
     * @test
     */
    public function test_read_doft_shippers()
    {
        $doftShippers = doft_shippers::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/doft_shippers/'.$doftShippers->id
        );

        $this->assertApiResponse($doftShippers->toArray());
    }

    /**
     * @test
     */
    public function test_update_doft_shippers()
    {
        $doftShippers = doft_shippers::factory()->create();
        $editeddoft_shippers = doft_shippers::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/doft_shippers/'.$doftShippers->id,
            $editeddoft_shippers
        );

        $this->assertApiResponse($editeddoft_shippers);
    }

    /**
     * @test
     */
    public function test_delete_doft_shippers()
    {
        $doftShippers = doft_shippers::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/doft_shippers/'.$doftShippers->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/doft_shippers/'.$doftShippers->id
        );

        $this->response->assertStatus(404);
    }
}
