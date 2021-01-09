<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cpas_stream_item;

class cpas_stream_itemApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cpas_stream_item()
    {
        $cpasStreamItem = cpas_stream_item::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cpas_stream_items', $cpasStreamItem
        );

        $this->assertApiResponse($cpasStreamItem);
    }

    /**
     * @test
     */
    public function test_read_cpas_stream_item()
    {
        $cpasStreamItem = cpas_stream_item::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cpas_stream_items/'.$cpasStreamItem->id
        );

        $this->assertApiResponse($cpasStreamItem->toArray());
    }

    /**
     * @test
     */
    public function test_update_cpas_stream_item()
    {
        $cpasStreamItem = cpas_stream_item::factory()->create();
        $editedcpas_stream_item = cpas_stream_item::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cpas_stream_items/'.$cpasStreamItem->id,
            $editedcpas_stream_item
        );

        $this->assertApiResponse($editedcpas_stream_item);
    }

    /**
     * @test
     */
    public function test_delete_cpas_stream_item()
    {
        $cpasStreamItem = cpas_stream_item::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cpas_stream_items/'.$cpasStreamItem->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cpas_stream_items/'.$cpasStreamItem->id
        );

        $this->response->assertStatus(404);
    }
}
