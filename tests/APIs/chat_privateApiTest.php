<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\chat_private;

class chat_privateApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chat_private()
    {
        $chatPrivate = chat_private::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chat_privates', $chatPrivate
        );

        $this->assertApiResponse($chatPrivate);
    }

    /**
     * @test
     */
    public function test_read_chat_private()
    {
        $chatPrivate = chat_private::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/chat_privates/'.$chatPrivate->id
        );

        $this->assertApiResponse($chatPrivate->toArray());
    }

    /**
     * @test
     */
    public function test_update_chat_private()
    {
        $chatPrivate = chat_private::factory()->create();
        $editedchat_private = chat_private::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chat_privates/'.$chatPrivate->id,
            $editedchat_private
        );

        $this->assertApiResponse($editedchat_private);
    }

    /**
     * @test
     */
    public function test_delete_chat_private()
    {
        $chatPrivate = chat_private::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chat_privates/'.$chatPrivate->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chat_privates/'.$chatPrivate->id
        );

        $this->response->assertStatus(404);
    }
}
