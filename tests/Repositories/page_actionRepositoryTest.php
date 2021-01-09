<?php namespace Tests\Repositories;

use App\Models\page_action;
use App\Repositories\page_actionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class page_actionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var page_actionRepository
     */
    protected $pageActionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pageActionRepo = \App::make(page_actionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_page_action()
    {
        $pageAction = page_action::factory()->make()->toArray();

        $createdpage_action = $this->pageActionRepo->create($pageAction);

        $createdpage_action = $createdpage_action->toArray();
        $this->assertArrayHasKey('id', $createdpage_action);
        $this->assertNotNull($createdpage_action['id'], 'Created page_action must have id specified');
        $this->assertNotNull(page_action::find($createdpage_action['id']), 'page_action with given id must be in DB');
        $this->assertModelData($pageAction, $createdpage_action);
    }

    /**
     * @test read
     */
    public function test_read_page_action()
    {
        $pageAction = page_action::factory()->create();

        $dbpage_action = $this->pageActionRepo->find($pageAction->id);

        $dbpage_action = $dbpage_action->toArray();
        $this->assertModelData($pageAction->toArray(), $dbpage_action);
    }

    /**
     * @test update
     */
    public function test_update_page_action()
    {
        $pageAction = page_action::factory()->create();
        $fakepage_action = page_action::factory()->make()->toArray();

        $updatedpage_action = $this->pageActionRepo->update($fakepage_action, $pageAction->id);

        $this->assertModelData($fakepage_action, $updatedpage_action->toArray());
        $dbpage_action = $this->pageActionRepo->find($pageAction->id);
        $this->assertModelData($fakepage_action, $dbpage_action->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_page_action()
    {
        $pageAction = page_action::factory()->create();

        $resp = $this->pageActionRepo->delete($pageAction->id);

        $this->assertTrue($resp);
        $this->assertNull(page_action::find($pageAction->id), 'page_action should not exist in DB');
    }
}
