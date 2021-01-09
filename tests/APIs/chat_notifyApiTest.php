<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\chat_notify;

class chat_notifyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chat_notify()
    {
        $chatNotify = chat_notify::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chat_notifies', $chatNotify
        );

        $this->assertApiResponse($chatNotify);
    }

    /**
     * @test
     */
    public function test_read_chat_notify()
    {
        $chatNotify = chat_notify::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/chat_notifies/'.$chatNotify->id
        );

        $this->assertApiResponse($chatNotify->toArray());
    }

    /**
     * @test
     */
    public function test_update_chat_notify()
    {
        $chatNotify = chat_notify::factory()->create();
        $editedchat_notify = chat_notify::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chat_notifies/'.$chatNotify->id,
            $editedchat_notify
        );

        $this->assertApiResponse($editedchat_notify);
    }

    /**
     * @test
     */
    public function test_delete_chat_notify()
    {
        $chatNotify = chat_notify::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chat_notifies/'.$chatNotify->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chat_notifies/'.$chatNotify->id
        );

        $this->response->assertStatus(404);
    }
}
