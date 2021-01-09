<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\chat_group;

class chat_groupApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chat_group()
    {
        $chatGroup = chat_group::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chat_groups', $chatGroup
        );

        $this->assertApiResponse($chatGroup);
    }

    /**
     * @test
     */
    public function test_read_chat_group()
    {
        $chatGroup = chat_group::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/chat_groups/'.$chatGroup->id
        );

        $this->assertApiResponse($chatGroup->toArray());
    }

    /**
     * @test
     */
    public function test_update_chat_group()
    {
        $chatGroup = chat_group::factory()->create();
        $editedchat_group = chat_group::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chat_groups/'.$chatGroup->id,
            $editedchat_group
        );

        $this->assertApiResponse($editedchat_group);
    }

    /**
     * @test
     */
    public function test_delete_chat_group()
    {
        $chatGroup = chat_group::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chat_groups/'.$chatGroup->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chat_groups/'.$chatGroup->id
        );

        $this->response->assertStatus(404);
    }
}
