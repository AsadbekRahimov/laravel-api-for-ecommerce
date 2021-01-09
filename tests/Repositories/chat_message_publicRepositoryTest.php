<?php namespace Tests\Repositories;

use App\Models\chat_message_public;
use App\Repositories\chat_message_publicRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class chat_message_publicRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var chat_message_publicRepository
     */
    protected $chatMessagePublicRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chatMessagePublicRepo = \App::make(chat_message_publicRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chat_message_public()
    {
        $chatMessagePublic = chat_message_public::factory()->make()->toArray();

        $createdchat_message_public = $this->chatMessagePublicRepo->create($chatMessagePublic);

        $createdchat_message_public = $createdchat_message_public->toArray();
        $this->assertArrayHasKey('id', $createdchat_message_public);
        $this->assertNotNull($createdchat_message_public['id'], 'Created chat_message_public must have id specified');
        $this->assertNotNull(chat_message_public::find($createdchat_message_public['id']), 'chat_message_public with given id must be in DB');
        $this->assertModelData($chatMessagePublic, $createdchat_message_public);
    }

    /**
     * @test read
     */
    public function test_read_chat_message_public()
    {
        $chatMessagePublic = chat_message_public::factory()->create();

        $dbchat_message_public = $this->chatMessagePublicRepo->find($chatMessagePublic->id);

        $dbchat_message_public = $dbchat_message_public->toArray();
        $this->assertModelData($chatMessagePublic->toArray(), $dbchat_message_public);
    }

    /**
     * @test update
     */
    public function test_update_chat_message_public()
    {
        $chatMessagePublic = chat_message_public::factory()->create();
        $fakechat_message_public = chat_message_public::factory()->make()->toArray();

        $updatedchat_message_public = $this->chatMessagePublicRepo->update($fakechat_message_public, $chatMessagePublic->id);

        $this->assertModelData($fakechat_message_public, $updatedchat_message_public->toArray());
        $dbchat_message_public = $this->chatMessagePublicRepo->find($chatMessagePublic->id);
        $this->assertModelData($fakechat_message_public, $dbchat_message_public->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chat_message_public()
    {
        $chatMessagePublic = chat_message_public::factory()->create();

        $resp = $this->chatMessagePublicRepo->delete($chatMessagePublic->id);

        $this->assertTrue($resp);
        $this->assertNull(chat_message_public::find($chatMessagePublic->id), 'chat_message_public should not exist in DB');
    }
}
