<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\dyna_chess_query;

class dyna_chess_queryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dyna_chess_query()
    {
        $dynaChessQuery = dyna_chess_query::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dyna_chess_queries', $dynaChessQuery
        );

        $this->assertApiResponse($dynaChessQuery);
    }

    /**
     * @test
     */
    public function test_read_dyna_chess_query()
    {
        $dynaChessQuery = dyna_chess_query::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dyna_chess_queries/'.$dynaChessQuery->id
        );

        $this->assertApiResponse($dynaChessQuery->toArray());
    }

    /**
     * @test
     */
    public function test_update_dyna_chess_query()
    {
        $dynaChessQuery = dyna_chess_query::factory()->create();
        $editeddyna_chess_query = dyna_chess_query::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dyna_chess_queries/'.$dynaChessQuery->id,
            $editeddyna_chess_query
        );

        $this->assertApiResponse($editeddyna_chess_query);
    }

    /**
     * @test
     */
    public function test_delete_dyna_chess_query()
    {
        $dynaChessQuery = dyna_chess_query::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dyna_chess_queries/'.$dynaChessQuery->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dyna_chess_queries/'.$dynaChessQuery->id
        );

        $this->response->assertStatus(404);
    }
}
