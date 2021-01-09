<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\chat_mail;

class chat_mailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_chat_mail()
    {
        $chatMail = chat_mail::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/chat_mails', $chatMail
        );

        $this->assertApiResponse($chatMail);
    }

    /**
     * @test
     */
    public function test_read_chat_mail()
    {
        $chatMail = chat_mail::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/chat_mails/'.$chatMail->id
        );

        $this->assertApiResponse($chatMail->toArray());
    }

    /**
     * @test
     */
    public function test_update_chat_mail()
    {
        $chatMail = chat_mail::factory()->create();
        $editedchat_mail = chat_mail::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/chat_mails/'.$chatMail->id,
            $editedchat_mail
        );

        $this->assertApiResponse($editedchat_mail);
    }

    /**
     * @test
     */
    public function test_delete_chat_mail()
    {
        $chatMail = chat_mail::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/chat_mails/'.$chatMail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/chat_mails/'.$chatMail->id
        );

        $this->response->assertStatus(404);
    }
}
