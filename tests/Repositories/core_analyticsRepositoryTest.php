<?php namespace Tests\Repositories;

use App\Models\core_analytics;
use App\Repositories\core_analyticsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class core_analyticsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var core_analyticsRepository
     */
    protected $coreAnalyticsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coreAnalyticsRepo = \App::make(core_analyticsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_core_analytics()
    {
        $coreAnalytics = core_analytics::factory()->make()->toArray();

        $createdcore_analytics = $this->coreAnalyticsRepo->create($coreAnalytics);

        $createdcore_analytics = $createdcore_analytics->toArray();
        $this->assertArrayHasKey('id', $createdcore_analytics);
        $this->assertNotNull($createdcore_analytics['id'], 'Created core_analytics must have id specified');
        $this->assertNotNull(core_analytics::find($createdcore_analytics['id']), 'core_analytics with given id must be in DB');
        $this->assertModelData($coreAnalytics, $createdcore_analytics);
    }

    /**
     * @test read
     */
    public function test_read_core_analytics()
    {
        $coreAnalytics = core_analytics::factory()->create();

        $dbcore_analytics = $this->coreAnalyticsRepo->find($coreAnalytics->id);

        $dbcore_analytics = $dbcore_analytics->toArray();
        $this->assertModelData($coreAnalytics->toArray(), $dbcore_analytics);
    }

    /**
     * @test update
     */
    public function test_update_core_analytics()
    {
        $coreAnalytics = core_analytics::factory()->create();
        $fakecore_analytics = core_analytics::factory()->make()->toArray();

        $updatedcore_analytics = $this->coreAnalyticsRepo->update($fakecore_analytics, $coreAnalytics->id);

        $this->assertModelData($fakecore_analytics, $updatedcore_analytics->toArray());
        $dbcore_analytics = $this->coreAnalyticsRepo->find($coreAnalytics->id);
        $this->assertModelData($fakecore_analytics, $dbcore_analytics->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_core_analytics()
    {
        $coreAnalytics = core_analytics::factory()->create();

        $resp = $this->coreAnalyticsRepo->delete($coreAnalytics->id);

        $this->assertTrue($resp);
        $this->assertNull(core_analytics::find($coreAnalytics->id), 'core_analytics should not exist in DB');
    }
}
