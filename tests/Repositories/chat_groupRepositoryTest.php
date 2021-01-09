<?php namespace Tests\Repositories;

use App\Models\chat_group;
use App\Repositories\chat_groupRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class chat_groupRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var chat_groupRepository
     */
    protected $chatGroupRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->chatGroupRepo = \App::make(chat_groupRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_chat_group()
    {
        $chatGroup = chat_group::factory()->make()->toArray();

        $createdchat_group = $this->chatGroupRepo->create($chatGroup);

        $createdchat_group = $createdchat_group->toArray();
        $this->assertArrayHasKey('id', $createdchat_group);
        $this->assertNotNull($createdchat_group['id'], 'Created chat_group must have id specified');
        $this->assertNotNull(chat_group::find($createdchat_group['id']), 'chat_group with given id must be in DB');
        $this->assertModelData($chatGroup, $createdchat_group);
    }

    /**
     * @test read
     */
    public function test_read_chat_group()
    {
        $chatGroup = chat_group::factory()->create();

        $dbchat_group = $this->chatGroupRepo->find($chatGroup->id);

        $dbchat_group = $dbchat_group->toArray();
        $this->assertModelData($chatGroup->toArray(), $dbchat_group);
    }

    /**
     * @test update
     */
    public function test_update_chat_group()
    {
        $chatGroup = chat_group::factory()->create();
        $fakechat_group = chat_group::factory()->make()->toArray();

        $updatedchat_group = $this->chatGroupRepo->update($fakechat_group, $chatGroup->id);

        $this->assertModelData($fakechat_group, $updatedchat_group->toArray());
        $dbchat_group = $this->chatGroupRepo->find($chatGroup->id);
        $this->assertModelData($fakechat_group, $dbchat_group->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_chat_group()
    {
        $chatGroup = chat_group::factory()->create();

        $resp = $this->chatGroupRepo->delete($chatGroup->id);

        $this->assertTrue($resp);
        $this->assertNull(chat_group::find($chatGroup->id), 'chat_group should not exist in DB');
    }
}
