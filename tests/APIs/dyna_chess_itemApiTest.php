<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\dyna_chess_item;

class dyna_chess_itemApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dyna_chess_item()
    {
        $dynaChessItem = dyna_chess_item::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dyna_chess_items', $dynaChessItem
        );

        $this->assertApiResponse($dynaChessItem);
    }

    /**
     * @test
     */
    public function test_read_dyna_chess_item()
    {
        $dynaChessItem = dyna_chess_item::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dyna_chess_items/'.$dynaChessItem->id
        );

        $this->assertApiResponse($dynaChessItem->toArray());
    }

    /**
     * @test
     */
    public function test_update_dyna_chess_item()
    {
        $dynaChessItem = dyna_chess_item::factory()->create();
        $editeddyna_chess_item = dyna_chess_item::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dyna_chess_items/'.$dynaChessItem->id,
            $editeddyna_chess_item
        );

        $this->assertApiResponse($editeddyna_chess_item);
    }

    /**
     * @test
     */
    public function test_delete_dyna_chess_item()
    {
        $dynaChessItem = dyna_chess_item::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dyna_chess_items/'.$dynaChessItem->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dyna_chess_items/'.$dynaChessItem->id
        );

        $this->response->assertStatus(404);
    }
}
