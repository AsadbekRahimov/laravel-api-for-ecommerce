<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\page_blocks_type;

class page_blocks_typeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_page_blocks_type()
    {
        $pageBlocksType = page_blocks_type::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/page_blocks_types', $pageBlocksType
        );

        $this->assertApiResponse($pageBlocksType);
    }

    /**
     * @test
     */
    public function test_read_page_blocks_type()
    {
        $pageBlocksType = page_blocks_type::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/page_blocks_types/'.$pageBlocksType->id
        );

        $this->assertApiResponse($pageBlocksType->toArray());
    }

    /**
     * @test
     */
    public function test_update_page_blocks_type()
    {
        $pageBlocksType = page_blocks_type::factory()->create();
        $editedpage_blocks_type = page_blocks_type::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/page_blocks_types/'.$pageBlocksType->id,
            $editedpage_blocks_type
        );

        $this->assertApiResponse($editedpage_blocks_type);
    }

    /**
     * @test
     */
    public function test_delete_page_blocks_type()
    {
        $pageBlocksType = page_blocks_type::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/page_blocks_types/'.$pageBlocksType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/page_blocks_types/'.$pageBlocksType->id
        );

        $this->response->assertStatus(404);
    }
}
