<?php namespace Tests\Repositories;

use App\Models\chat_notify;
use App\Repositories\chat_notifyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class chat_notifyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var chat_notifyRepository
     */
    protected $chatNotifyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chatNotifyRepo = \App::make(chat_notifyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chat_notify()
    {
        $chatNotify = chat_notify::factory()->make()->toArray();

        $createdchat_notify = $this->chatNotifyRepo->create($chatNotify);

        $createdchat_notify = $createdchat_notify->toArray();
        $this->assertArrayHasKey('id', $createdchat_notify);
        $this->assertNotNull($createdchat_notify['id'], 'Created chat_notify must have id specified');
        $this->assertNotNull(chat_notify::find($createdchat_notify['id']), 'chat_notify with given id must be in DB');
        $this->assertModelData($chatNotify, $createdchat_notify);
    }

    /**
     * @test read
     */
    public function test_read_chat_notify()
    {
        $chatNotify = chat_notify::factory()->create();

        $dbchat_notify = $this->chatNotifyRepo->find($chatNotify->id);

        $dbchat_notify = $dbchat_notify->toArray();
        $this->assertModelData($chatNotify->toArray(), $dbchat_notify);
    }

    /**
     * @test update
     */
    public function test_update_chat_notify()
    {
        $chatNotify = chat_notify::factory()->create();
        $fakechat_notify = chat_notify::factory()->make()->toArray();

        $updatedchat_notify = $this->chatNotifyRepo->update($fakechat_notify, $chatNotify->id);

        $this->assertModelData($fakechat_notify, $updatedchat_notify->toArray());
        $dbchat_notify = $this->chatNotifyRepo->find($chatNotify->id);
        $this->assertModelData($fakechat_notify, $dbchat_notify->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chat_notify()
    {
        $chatNotify = chat_notify::factory()->create();

        $resp = $this->chatNotifyRepo->delete($chatNotify->id);

        $this->assertTrue($resp);
        $this->assertNull(chat_notify::find($chatNotify->id), 'chat_notify should not exist in DB');
    }
}
