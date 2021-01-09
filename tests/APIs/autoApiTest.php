<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\auto;

class autoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_auto()
    {
        $auto = auto::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/autos', $auto
        );

        $this->assertApiResponse($auto);
    }

    /**
     * @test
     */
    public function test_read_auto()
    {
        $auto = auto::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/autos/'.$auto->id
        );

        $this->assertApiResponse($auto->toArray());
    }

    /**
     * @test
     */
    public function test_update_auto()
    {
        $auto = auto::factory()->create();
        $editedauto = auto::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/autos/'.$auto->id,
            $editedauto
        );

        $this->assertApiResponse($editedauto);
    }

    /**
     * @test
     */
    public function test_delete_auto()
    {
        $auto = auto::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/autos/'.$auto->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/autos/'.$auto->id
        );

        $this->response->assertStatus(404);
    }
}
