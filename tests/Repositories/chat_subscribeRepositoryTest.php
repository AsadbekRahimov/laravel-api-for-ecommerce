<?php namespace Tests\Repositories;

use App\Models\chat_subscribe;
use App\Repositories\chat_subscribeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class chat_subscribeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var chat_subscribeRepository
     */
    protected $chatSubscribeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chatSubscribeRepo = \App::make(chat_subscribeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chat_subscribe()
    {
        $chatSubscribe = chat_subscribe::factory()->make()->toArray();

        $createdchat_subscribe = $this->chatSubscribeRepo->create($chatSubscribe);

        $createdchat_subscribe = $createdchat_subscribe->toArray();
        $this->assertArrayHasKey('id', $createdchat_subscribe);
        $this->assertNotNull($createdchat_subscribe['id'], 'Created chat_subscribe must have id specified');
        $this->assertNotNull(chat_subscribe::find($createdchat_subscribe['id']), 'chat_subscribe with given id must be in DB');
        $this->assertModelData($chatSubscribe, $createdchat_subscribe);
    }

    /**
     * @test read
     */
    public function test_read_chat_subscribe()
    {
        $chatSubscribe = chat_subscribe::factory()->create();

        $dbchat_subscribe = $this->chatSubscribeRepo->find($chatSubscribe->id);

        $dbchat_subscribe = $dbchat_subscribe->toArray();
        $this->assertModelData($chatSubscribe->toArray(), $dbchat_subscribe);
    }

    /**
     * @test update
     */
    public function test_update_chat_subscribe()
    {
        $chatSubscribe = chat_subscribe::factory()->create();
        $fakechat_subscribe = chat_subscribe::factory()->make()->toArray();

        $updatedchat_subscribe = $this->chatSubscribeRepo->update($fakechat_subscribe, $chatSubscribe->id);

        $this->assertModelData($fakechat_subscribe, $updatedchat_subscribe->toArray());
        $dbchat_subscribe = $this->chatSubscribeRepo->find($chatSubscribe->id);
        $this->assertModelData($fakechat_subscribe, $dbchat_subscribe->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chat_subscribe()
    {
        $chatSubscribe = chat_subscribe::factory()->create();

        $resp = $this->chatSubscribeRepo->delete($chatSubscribe->id);

        $this->assertTrue($resp);
        $this->assertNull(chat_subscribe::find($chatSubscribe->id), 'chat_subscribe should not exist in DB');
    }
}
