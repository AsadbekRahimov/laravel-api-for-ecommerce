<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\core_migra;

class core_migraApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_core_migra()
    {
        $coreMigra = core_migra::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/core_migras', $coreMigra
        );

        $this->assertApiResponse($coreMigra);
    }

    /**
     * @test
     */
    public function test_read_core_migra()
    {
        $coreMigra = core_migra::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/core_migras/'.$coreMigra->id
        );

        $this->assertApiResponse($coreMigra->toArray());
    }

    /**
     * @test
     */
    public function test_update_core_migra()
    {
        $coreMigra = core_migra::factory()->create();
        $editedcore_migra = core_migra::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/core_migras/'.$coreMigra->id,
            $editedcore_migra
        );

        $this->assertApiResponse($editedcore_migra);
    }

    /**
     * @test
     */
    public function test_delete_core_migra()
    {
        $coreMigra = core_migra::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/core_migras/'.$coreMigra->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/core_migras/'.$coreMigra->id
        );

        $this->response->assertStatus(404);
    }
}
