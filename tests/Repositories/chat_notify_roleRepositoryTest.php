<?php namespace Tests\Repositories;

use App\Models\chat_notify_role;
use App\Repositories\chat_notify_roleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class chat_notify_roleRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var chat_notify_roleRepository
     */
    protected $chatNotifyRoleRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chatNotifyRoleRepo = \App::make(chat_notify_roleRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chat_notify_role()
    {
        $chatNotifyRole = chat_notify_role::factory()->make()->toArray();

        $createdchat_notify_role = $this->chatNotifyRoleRepo->create($chatNotifyRole);

        $createdchat_notify_role = $createdchat_notify_role->toArray();
        $this->assertArrayHasKey('id', $createdchat_notify_role);
        $this->assertNotNull($createdchat_notify_role['id'], 'Created chat_notify_role must have id specified');
        $this->assertNotNull(chat_notify_role::find($createdchat_notify_role['id']), 'chat_notify_role with given id must be in DB');
        $this->assertModelData($chatNotifyRole, $createdchat_notify_role);
    }

    /**
     * @test read
     */
    public function test_read_chat_notify_role()
    {
        $chatNotifyRole = chat_notify_role::factory()->create();

        $dbchat_notify_role = $this->chatNotifyRoleRepo->find($chatNotifyRole->id);

        $dbchat_notify_role = $dbchat_notify_role->toArray();
        $this->assertModelData($chatNotifyRole->toArray(), $dbchat_notify_role);
    }

    /**
     * @test update
     */
    public function test_update_chat_notify_role()
    {
        $chatNotifyRole = chat_notify_role::factory()->create();
        $fakechat_notify_role = chat_notify_role::factory()->make()->toArray();

        $updatedchat_notify_role = $this->chatNotifyRoleRepo->update($fakechat_notify_role, $chatNotifyRole->id);

        $this->assertModelData($fakechat_notify_role, $updatedchat_notify_role->toArray());
        $dbchat_notify_role = $this->chatNotifyRoleRepo->find($chatNotifyRole->id);
        $this->assertModelData($fakechat_notify_role, $dbchat_notify_role->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chat_notify_role()
    {
        $chatNotifyRole = chat_notify_role::factory()->create();

        $resp = $this->chatNotifyRoleRepo->delete($chatNotifyRole->id);

        $this->assertTrue($resp);
        $this->assertNull(chat_notify_role::find($chatNotifyRole->id), 'chat_notify_role should not exist in DB');
    }
}
