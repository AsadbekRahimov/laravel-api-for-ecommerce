<?php namespace Tests\Repositories;

use App\Models\dyna_dynagrid_dtl;
use App\Repositories\dyna_dynagrid_dtlRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dyna_dynagrid_dtlRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dyna_dynagrid_dtlRepository
     */
    protected $dynaDynagridDtlRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dynaDynagridDtlRepo = \App::make(dyna_dynagrid_dtlRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dyna_dynagrid_dtl()
    {
        $dynaDynagridDtl = dyna_dynagrid_dtl::factory()->make()->toArray();

        $createddyna_dynagrid_dtl = $this->dynaDynagridDtlRepo->create($dynaDynagridDtl);

        $createddyna_dynagrid_dtl = $createddyna_dynagrid_dtl->toArray();
        $this->assertArrayHasKey('id', $createddyna_dynagrid_dtl);
        $this->assertNotNull($createddyna_dynagrid_dtl['id'], 'Created dyna_dynagrid_dtl must have id specified');
        $this->assertNotNull(dyna_dynagrid_dtl::find($createddyna_dynagrid_dtl['id']), 'dyna_dynagrid_dtl with given id must be in DB');
        $this->assertModelData($dynaDynagridDtl, $createddyna_dynagrid_dtl);
    }

    /**
     * @test read
     */
    public function test_read_dyna_dynagrid_dtl()
    {
        $dynaDynagridDtl = dyna_dynagrid_dtl::factory()->create();

        $dbdyna_dynagrid_dtl = $this->dynaDynagridDtlRepo->find($dynaDynagridDtl->id);

        $dbdyna_dynagrid_dtl = $dbdyna_dynagrid_dtl->toArray();
        $this->assertModelData($dynaDynagridDtl->toArray(), $dbdyna_dynagrid_dtl);
    }

    /**
     * @test update
     */
    public function test_update_dyna_dynagrid_dtl()
    {
        $dynaDynagridDtl = dyna_dynagrid_dtl::factory()->create();
        $fakedyna_dynagrid_dtl = dyna_dynagrid_dtl::factory()->make()->toArray();

        $updateddyna_dynagrid_dtl = $this->dynaDynagridDtlRepo->update($fakedyna_dynagrid_dtl, $dynaDynagridDtl->id);

        $this->assertModelData($fakedyna_dynagrid_dtl, $updateddyna_dynagrid_dtl->toArray());
        $dbdyna_dynagrid_dtl = $this->dynaDynagridDtlRepo->find($dynaDynagridDtl->id);
        $this->assertModelData($fakedyna_dynagrid_dtl, $dbdyna_dynagrid_dtl->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dyna_dynagrid_dtl()
    {
        $dynaDynagridDtl = dyna_dynagrid_dtl::factory()->create();

        $resp = $this->dynaDynagridDtlRepo->delete($dynaDynagridDtl->id);

        $this->assertTrue($resp);
        $this->assertNull(dyna_dynagrid_dtl::find($dynaDynagridDtl->id), 'dyna_dynagrid_dtl should not exist in DB');
    }
}
