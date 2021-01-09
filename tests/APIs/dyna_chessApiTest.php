<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\dyna_chess;

class dyna_chessApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dyna_chess()
    {
        $dynaChess = dyna_chess::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dyna_chesses', $dynaChess
        );

        $this->assertApiResponse($dynaChess);
    }

    /**
     * @test
     */
    public function test_read_dyna_chess()
    {
        $dynaChess = dyna_chess::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dyna_chesses/'.$dynaChess->id
        );

        $this->assertApiResponse($dynaChess->toArray());
    }

    /**
     * @test
     */
    public function test_update_dyna_chess()
    {
        $dynaChess = dyna_chess::factory()->create();
        $editeddyna_chess = dyna_chess::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dyna_chesses/'.$dynaChess->id,
            $editeddyna_chess
        );

        $this->assertApiResponse($editeddyna_chess);
    }

    /**
     * @test
     */
    public function test_delete_dyna_chess()
    {
        $dynaChess = dyna_chess::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dyna_chesses/'.$dynaChess->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dyna_chesses/'.$dynaChess->id
        );

        $this->response->assertStatus(404);
    }
}
