<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\drag_config_db;

class drag_config_dbApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_drag_config_db()
    {
        $dragConfigDb = drag_config_db::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/drag_config_dbs', $dragConfigDb
        );

        $this->assertApiResponse($dragConfigDb);
    }

    /**
     * @test
     */
    public function test_read_drag_config_db()
    {
        $dragConfigDb = drag_config_db::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/drag_config_dbs/'.$dragConfigDb->id
        );

        $this->assertApiResponse($dragConfigDb->toArray());
    }

    /**
     * @test
     */
    public function test_update_drag_config_db()
    {
        $dragConfigDb = drag_config_db::factory()->create();
        $editeddrag_config_db = drag_config_db::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/drag_config_dbs/'.$dragConfigDb->id,
            $editeddrag_config_db
        );

        $this->assertApiResponse($editeddrag_config_db);
    }

    /**
     * @test
     */
    public function test_delete_drag_config_db()
    {
        $dragConfigDb = drag_config_db::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/drag_config_dbs/'.$dragConfigDb->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/drag_config_dbs/'.$dragConfigDb->id
        );

        $this->response->assertStatus(404);
    }
}
