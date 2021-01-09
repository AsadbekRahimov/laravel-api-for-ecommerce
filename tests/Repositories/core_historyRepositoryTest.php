<?php namespace Tests\Repositories;

use App\Models\core_history;
use App\Repositories\core_historyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class core_historyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var core_historyRepository
     */
    protected $coreHistoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coreHistoryRepo = \App::make(core_historyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_core_history()
    {
        $coreHistory = core_history::factory()->make()->toArray();

        $createdcore_history = $this->coreHistoryRepo->create($coreHistory);

        $createdcore_history = $createdcore_history->toArray();
        $this->assertArrayHasKey('id', $createdcore_history);
        $this->assertNotNull($createdcore_history['id'], 'Created core_history must have id specified');
        $this->assertNotNull(core_history::find($createdcore_history['id']), 'core_history with given id must be in DB');
        $this->assertModelData($coreHistory, $createdcore_history);
    }

    /**
     * @test read
     */
    public function test_read_core_history()
    {
        $coreHistory = core_history::factory()->create();

        $dbcore_history = $this->coreHistoryRepo->find($coreHistory->id);

        $dbcore_history = $dbcore_history->toArray();
        $this->assertModelData($coreHistory->toArray(), $dbcore_history);
    }

    /**
     * @test update
     */
    public function test_update_core_history()
    {
        $coreHistory = core_history::factory()->create();
        $fakecore_history = core_history::factory()->make()->toArray();

        $updatedcore_history = $this->coreHistoryRepo->update($fakecore_history, $coreHistory->id);

        $this->assertModelData($fakecore_history, $updatedcore_history->toArray());
        $dbcore_history = $this->coreHistoryRepo->find($coreHistory->id);
        $this->assertModelData($fakecore_history, $dbcore_history->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_core_history()
    {
        $coreHistory = core_history::factory()->create();

        $resp = $this->coreHistoryRepo->delete($coreHistory->id);

        $this->assertTrue($resp);
        $this->assertNull(core_history::find($coreHistory->id), 'core_history should not exist in DB');
    }
}
