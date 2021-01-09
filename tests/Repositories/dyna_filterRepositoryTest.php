<?php namespace Tests\Repositories;

use App\Models\dyna_filter;
use App\Repositories\dyna_filterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dyna_filterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dyna_filterRepository
     */
    protected $dynaFilterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dynaFilterRepo = \App::make(dyna_filterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dyna_filter()
    {
        $dynaFilter = dyna_filter::factory()->make()->toArray();

        $createddyna_filter = $this->dynaFilterRepo->create($dynaFilter);

        $createddyna_filter = $createddyna_filter->toArray();
        $this->assertArrayHasKey('id', $createddyna_filter);
        $this->assertNotNull($createddyna_filter['id'], 'Created dyna_filter must have id specified');
        $this->assertNotNull(dyna_filter::find($createddyna_filter['id']), 'dyna_filter with given id must be in DB');
        $this->assertModelData($dynaFilter, $createddyna_filter);
    }

    /**
     * @test read
     */
    public function test_read_dyna_filter()
    {
        $dynaFilter = dyna_filter::factory()->create();

        $dbdyna_filter = $this->dynaFilterRepo->find($dynaFilter->id);

        $dbdyna_filter = $dbdyna_filter->toArray();
        $this->assertModelData($dynaFilter->toArray(), $dbdyna_filter);
    }

    /**
     * @test update
     */
    public function test_update_dyna_filter()
    {
        $dynaFilter = dyna_filter::factory()->create();
        $fakedyna_filter = dyna_filter::factory()->make()->toArray();

        $updateddyna_filter = $this->dynaFilterRepo->update($fakedyna_filter, $dynaFilter->id);

        $this->assertModelData($fakedyna_filter, $updateddyna_filter->toArray());
        $dbdyna_filter = $this->dynaFilterRepo->find($dynaFilter->id);
        $this->assertModelData($fakedyna_filter, $dbdyna_filter->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dyna_filter()
    {
        $dynaFilter = dyna_filter::factory()->create();

        $resp = $this->dynaFilterRepo->delete($dynaFilter->id);

        $this->assertTrue($resp);
        $this->assertNull(dyna_filter::find($dynaFilter->id), 'dyna_filter should not exist in DB');
    }
}
