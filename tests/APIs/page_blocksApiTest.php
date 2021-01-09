<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\page_blocks;

class page_blocksApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_page_blocks()
    {
        $pageBlocks = page_blocks::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/page_blocks', $pageBlocks
        );

        $this->assertApiResponse($pageBlocks);
    }

    /**
     * @test
     */
    public function test_read_page_blocks()
    {
        $pageBlocks = page_blocks::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/page_blocks/'.$pageBlocks->id
        );

        $this->assertApiResponse($pageBlocks->toArray());
    }

    /**
     * @test
     */
    public function test_update_page_blocks()
    {
        $pageBlocks = page_blocks::factory()->create();
        $editedpage_blocks = page_blocks::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/page_blocks/'.$pageBlocks->id,
            $editedpage_blocks
        );

        $this->assertApiResponse($editedpage_blocks);
    }

    /**
     * @test
     */
    public function test_delete_page_blocks()
    {
        $pageBlocks = page_blocks::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/page_blocks/'.$pageBlocks->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/page_blocks/'.$pageBlocks->id
        );

        $this->response->assertStatus(404);
    }
}
