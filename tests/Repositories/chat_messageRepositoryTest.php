<?php namespace Tests\Repositories;

use App\Models\chat_message;
use App\Repositories\chat_messageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class chat_messageRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var chat_messageRepository
     */
    protected $chatMessageRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chatMessageRepo = \App::make(chat_messageRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chat_message()
    {
        $chatMessage = chat_message::factory()->make()->toArray();

        $createdchat_message = $this->chatMessageRepo->create($chatMessage);

        $createdchat_message = $createdchat_message->toArray();
        $this->assertArrayHasKey('id', $createdchat_message);
        $this->assertNotNull($createdchat_message['id'], 'Created chat_message must have id specified');
        $this->assertNotNull(chat_message::find($createdchat_message['id']), 'chat_message with given id must be in DB');
        $this->assertModelData($chatMessage, $createdchat_message);
    }

    /**
     * @test read
     */
    public function test_read_chat_message()
    {
        $chatMessage = chat_message::factory()->create();

        $dbchat_message = $this->chatMessageRepo->find($chatMessage->id);

        $dbchat_message = $dbchat_message->toArray();
        $this->assertModelData($chatMessage->toArray(), $dbchat_message);
    }

    /**
     * @test update
     */
    public function test_update_chat_message()
    {
        $chatMessage = chat_message::factory()->create();
        $fakechat_message = chat_message::factory()->make()->toArray();

        $updatedchat_message = $this->chatMessageRepo->update($fakechat_message, $chatMessage->id);

        $this->assertModelData($fakechat_message, $updatedchat_message->toArray());
        $dbchat_message = $this->chatMessageRepo->find($chatMessage->id);
        $this->assertModelData($fakechat_message, $dbchat_message->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chat_message()
    {
        $chatMessage = chat_message::factory()->create();

        $resp = $this->chatMessageRepo->delete($chatMessage->id);

        $this->assertTrue($resp);
        $this->assertNull(chat_message::find($chatMessage->id), 'chat_message should not exist in DB');
    }
}
