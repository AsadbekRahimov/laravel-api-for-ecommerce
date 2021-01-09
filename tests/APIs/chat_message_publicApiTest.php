<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\chat_message_public;

class chat_message_publicApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chat_message_public()
    {
        $chatMessagePublic = chat_message_public::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chat_message_publics', $chatMessagePublic
        );

        $this->assertApiResponse($chatMessagePublic);
    }

    /**
     * @test
     */
    public function test_read_chat_message_public()
    {
        $chatMessagePublic = chat_message_public::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/chat_message_publics/'.$chatMessagePublic->id
        );

        $this->assertApiResponse($chatMessagePublic->toArray());
    }

    /**
     * @test
     */
    public function test_update_chat_message_public()
    {
        $chatMessagePublic = chat_message_public::factory()->create();
        $editedchat_message_public = chat_message_public::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chat_message_publics/'.$chatMessagePublic->id,
            $editedchat_message_public
        );

        $this->assertApiResponse($editedchat_message_public);
    }

    /**
     * @test
     */
    public function test_delete_chat_message_public()
    {
        $chatMessagePublic = chat_message_public::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chat_message_publics/'.$chatMessagePublic->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chat_message_publics/'.$chatMessagePublic->id
        );

        $this->response->assertStatus(404);
    }
}
