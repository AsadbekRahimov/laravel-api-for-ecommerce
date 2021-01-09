<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\chat_subscribe;

class chat_subscribeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chat_subscribe()
    {
        $chatSubscribe = chat_subscribe::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chat_subscribes', $chatSubscribe
        );

        $this->assertApiResponse($chatSubscribe);
    }

    /**
     * @test
     */
    public function test_read_chat_subscribe()
    {
        $chatSubscribe = chat_subscribe::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/chat_subscribes/'.$chatSubscribe->id
        );

        $this->assertApiResponse($chatSubscribe->toArray());
    }

    /**
     * @test
     */
    public function test_update_chat_subscribe()
    {
        $chatSubscribe = chat_subscribe::factory()->create();
        $editedchat_subscribe = chat_subscribe::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chat_subscribes/'.$chatSubscribe->id,
            $editedchat_subscribe
        );

        $this->assertApiResponse($editedchat_subscribe);
    }

    /**
     * @test
     */
    public function test_delete_chat_subscribe()
    {
        $chatSubscribe = chat_subscribe::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chat_subscribes/'.$chatSubscribe->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chat_subscribes/'.$chatSubscribe->id
        );

        $this->response->assertStatus(404);
    }
}
