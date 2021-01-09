<?php namespace Tests\Repositories;

use App\Models\dyna_stats;
use App\Repositories\dyna_statsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dyna_statsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dyna_statsRepository
     */
    protected $dynaStatsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dynaStatsRepo = \App::make(dyna_statsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dyna_stats()
    {
        $dynaStats = dyna_stats::factory()->make()->toArray();

        $createddyna_stats = $this->dynaStatsRepo->create($dynaStats);

        $createddyna_stats = $createddyna_stats->toArray();
        $this->assertArrayHasKey('id', $createddyna_stats);
        $this->assertNotNull($createddyna_stats['id'], 'Created dyna_stats must have id specified');
        $this->assertNotNull(dyna_stats::find($createddyna_stats['id']), 'dyna_stats with given id must be in DB');
        $this->assertModelData($dynaStats, $createddyna_stats);
    }

    /**
     * @test read
     */
    public function test_read_dyna_stats()
    {
        $dynaStats = dyna_stats::factory()->create();

        $dbdyna_stats = $this->dynaStatsRepo->find($dynaStats->id);

        $dbdyna_stats = $dbdyna_stats->toArray();
        $this->assertModelData($dynaStats->toArray(), $dbdyna_stats);
    }

    /**
     * @test update
     */
    public function test_update_dyna_stats()
    {
        $dynaStats = dyna_stats::factory()->create();
        $fakedyna_stats = dyna_stats::factory()->make()->toArray();

        $updateddyna_stats = $this->dynaStatsRepo->update($fakedyna_stats, $dynaStats->id);

        $this->assertModelData($fakedyna_stats, $updateddyna_stats->toArray());
        $dbdyna_stats = $this->dynaStatsRepo->find($dynaStats->id);
        $this->assertModelData($fakedyna_stats, $dbdyna_stats->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dyna_stats()
    {
        $dynaStats = dyna_stats::factory()->create();

        $resp = $this->dynaStatsRepo->delete($dynaStats->id);

        $this->assertTrue($resp);
        $this->assertNull(dyna_stats::find($dynaStats->id), 'dyna_stats should not exist in DB');
    }
}
