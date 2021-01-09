<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\chat_notify_role;

class chat_notify_roleApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chat_notify_role()
    {
        $chatNotifyRole = chat_notify_role::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chat_notify_roles', $chatNotifyRole
        );

        $this->assertApiResponse($chatNotifyRole);
    }

    /**
     * @test
     */
    public function test_read_chat_notify_role()
    {
        $chatNotifyRole = chat_notify_role::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/chat_notify_roles/'.$chatNotifyRole->id
        );

        $this->assertApiResponse($chatNotifyRole->toArray());
    }

    /**
     * @test
     */
    public function test_update_chat_notify_role()
    {
        $chatNotifyRole = chat_notify_role::factory()->create();
        $editedchat_notify_role = chat_notify_role::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chat_notify_roles/'.$chatNotifyRole->id,
            $editedchat_notify_role
        );

        $this->assertApiResponse($editedchat_notify_role);
    }

    /**
     * @test
     */
    public function test_delete_chat_notify_role()
    {
        $chatNotifyRole = chat_notify_role::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chat_notify_roles/'.$chatNotifyRole->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chat_notify_roles/'.$chatNotifyRole->id
        );

        $this->response->assertStatus(404);
    }
}
