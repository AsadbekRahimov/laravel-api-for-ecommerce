<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\drag_form_db;

class drag_form_dbApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_drag_form_db()
    {
        $dragFormDb = drag_form_db::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/drag_form_dbs', $dragFormDb
        );

        $this->assertApiResponse($dragFormDb);
    }

    /**
     * @test
     */
    public function test_read_drag_form_db()
    {
        $dragFormDb = drag_form_db::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/drag_form_dbs/'.$dragFormDb->id
        );

        $this->assertApiResponse($dragFormDb->toArray());
    }

    /**
     * @test
     */
    public function test_update_drag_form_db()
    {
        $dragFormDb = drag_form_db::factory()->create();
        $editeddrag_form_db = drag_form_db::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/drag_form_dbs/'.$dragFormDb->id,
            $editeddrag_form_db
        );

        $this->assertApiResponse($editeddrag_form_db);
    }

    /**
     * @test
     */
    public function test_delete_drag_form_db()
    {
        $dragFormDb = drag_form_db::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/drag_form_dbs/'.$dragFormDb->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/drag_form_dbs/'.$dragFormDb->id
        );

        $this->response->assertStatus(404);
    }
}
