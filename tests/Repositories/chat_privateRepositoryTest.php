<?php namespace Tests\Repositories;

use App\Models\chat_private;
use App\Repositories\chat_privateRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class chat_privateRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var chat_privateRepository
     */
    protected $chatPrivateRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chatPrivateRepo = \App::make(chat_privateRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chat_private()
    {
        $chatPrivate = chat_private::factory()->make()->toArray();

        $createdchat_private = $this->chatPrivateRepo->create($chatPrivate);

        $createdchat_private = $createdchat_private->toArray();
        $this->assertArrayHasKey('id', $createdchat_private);
        $this->assertNotNull($createdchat_private['id'], 'Created chat_private must have id specified');
        $this->assertNotNull(chat_private::find($createdchat_private['id']), 'chat_private with given id must be in DB');
        $this->assertModelData($chatPrivate, $createdchat_private);
    }

    /**
     * @test read
     */
    public function test_read_chat_private()
    {
        $chatPrivate = chat_private::factory()->create();

        $dbchat_private = $this->chatPrivateRepo->find($chatPrivate->id);

        $dbchat_private = $dbchat_private->toArray();
        $this->assertModelData($chatPrivate->toArray(), $dbchat_private);
    }

    /**
     * @test update
     */
    public function test_update_chat_private()
    {
        $chatPrivate = chat_private::factory()->create();
        $fakechat_private = chat_private::factory()->make()->toArray();

        $updatedchat_private = $this->chatPrivateRepo->update($fakechat_private, $chatPrivate->id);

        $this->assertModelData($fakechat_private, $updatedchat_private->toArray());
        $dbchat_private = $this->chatPrivateRepo->find($chatPrivate->id);
        $this->assertModelData($fakechat_private, $dbchat_private->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chat_private()
    {
        $chatPrivate = chat_private::factory()->create();

        $resp = $this->chatPrivateRepo->delete($chatPrivate->id);

        $this->assertTrue($resp);
        $this->assertNull(chat_private::find($chatPrivate->id), 'chat_private should not exist in DB');
    }
}
