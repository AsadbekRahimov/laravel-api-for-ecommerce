<?php namespace Tests\Repositories;

use App\Models\cpas_pays_history;
use App\Repositories\cpas_pays_historyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cpas_pays_historyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cpas_pays_historyRepository
     */
    protected $cpasPaysHistoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cpasPaysHistoryRepo = \App::make(cpas_pays_historyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cpas_pays_history()
    {
        $cpasPaysHistory = cpas_pays_history::factory()->make()->toArray();

        $createdcpas_pays_history = $this->cpasPaysHistoryRepo->create($cpasPaysHistory);

        $createdcpas_pays_history = $createdcpas_pays_history->toArray();
        $this->assertArrayHasKey('id', $createdcpas_pays_history);
        $this->assertNotNull($createdcpas_pays_history['id'], 'Created cpas_pays_history must have id specified');
        $this->assertNotNull(cpas_pays_history::find($createdcpas_pays_history['id']), 'cpas_pays_history with given id must be in DB');
        $this->assertModelData($cpasPaysHistory, $createdcpas_pays_history);
    }

    /**
     * @test read
     */
    public function test_read_cpas_pays_history()
    {
        $cpasPaysHistory = cpas_pays_history::factory()->create();

        $dbcpas_pays_history = $this->cpasPaysHistoryRepo->find($cpasPaysHistory->id);

        $dbcpas_pays_history = $dbcpas_pays_history->toArray();
        $this->assertModelData($cpasPaysHistory->toArray(), $dbcpas_pays_history);
    }

    /**
     * @test update
     */
    public function test_update_cpas_pays_history()
    {
        $cpasPaysHistory = cpas_pays_history::factory()->create();
        $fakecpas_pays_history = cpas_pays_history::factory()->make()->toArray();

        $updatedcpas_pays_history = $this->cpasPaysHistoryRepo->update($fakecpas_pays_history, $cpasPaysHistory->id);

        $this->assertModelData($fakecpas_pays_history, $updatedcpas_pays_history->toArray());
        $dbcpas_pays_history = $this->cpasPaysHistoryRepo->find($cpasPaysHistory->id);
        $this->assertModelData($fakecpas_pays_history, $dbcpas_pays_history->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cpas_pays_history()
    {
        $cpasPaysHistory = cpas_pays_history::factory()->create();

        $resp = $this->cpasPaysHistoryRepo->delete($cpasPaysHistory->id);

        $this->assertTrue($resp);
        $this->assertNull(cpas_pays_history::find($cpasPaysHistory->id), 'cpas_pays_history should not exist in DB');
    }
}
