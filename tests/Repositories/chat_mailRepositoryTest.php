<?php namespace Tests\Repositories;

use App\Models\chat_mail;
use App\Repositories\chat_mailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class chat_mailRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var chat_mailRepository
     */
    protected $chatMailRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chatMailRepo = \App::make(chat_mailRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chat_mail()
    {
        $chatMail = chat_mail::factory()->make()->toArray();

        $createdchat_mail = $this->chatMailRepo->create($chatMail);

        $createdchat_mail = $createdchat_mail->toArray();
        $this->assertArrayHasKey('id', $createdchat_mail);
        $this->assertNotNull($createdchat_mail['id'], 'Created chat_mail must have id specified');
        $this->assertNotNull(chat_mail::find($createdchat_mail['id']), 'chat_mail with given id must be in DB');
        $this->assertModelData($chatMail, $createdchat_mail);
    }

    /**
     * @test read
     */
    public function test_read_chat_mail()
    {
        $chatMail = chat_mail::factory()->create();

        $dbchat_mail = $this->chatMailRepo->find($chatMail->id);

        $dbchat_mail = $dbchat_mail->toArray();
        $this->assertModelData($chatMail->toArray(), $dbchat_mail);
    }

    /**
     * @test update
     */
    public function test_update_chat_mail()
    {
        $chatMail = chat_mail::factory()->create();
        $fakechat_mail = chat_mail::factory()->make()->toArray();

        $updatedchat_mail = $this->chatMailRepo->update($fakechat_mail, $chatMail->id);

        $this->assertModelData($fakechat_mail, $updatedchat_mail->toArray());
        $dbchat_mail = $this->chatMailRepo->find($chatMail->id);
        $this->assertModelData($fakechat_mail, $dbchat_mail->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chat_mail()
    {
        $chatMail = chat_mail::factory()->create();

        $resp = $this->chatMailRepo->delete($chatMail->id);

        $this->assertTrue($resp);
        $this->assertNull(chat_mail::find($chatMail->id), 'chat_mail should not exist in DB');
    }
}
