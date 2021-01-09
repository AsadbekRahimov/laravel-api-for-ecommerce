<?php namespace Tests\Repositories;

use App\Models\cpas_teaser;
use App\Repositories\cpas_teaserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cpas_teaserRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cpas_teaserRepository
     */
    protected $cpasTeaserRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cpasTeaserRepo = \App::make(cpas_teaserRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cpas_teaser()
    {
        $cpasTeaser = cpas_teaser::factory()->make()->toArray();

        $createdcpas_teaser = $this->cpasTeaserRepo->create($cpasTeaser);

        $createdcpas_teaser = $createdcpas_teaser->toArray();
        $this->assertArrayHasKey('id', $createdcpas_teaser);
        $this->assertNotNull($createdcpas_teaser['id'], 'Created cpas_teaser must have id specified');
        $this->assertNotNull(cpas_teaser::find($createdcpas_teaser['id']), 'cpas_teaser with given id must be in DB');
        $this->assertModelData($cpasTeaser, $createdcpas_teaser);
    }

    /**
     * @test read
     */
    public function test_read_cpas_teaser()
    {
        $cpasTeaser = cpas_teaser::factory()->create();

        $dbcpas_teaser = $this->cpasTeaserRepo->find($cpasTeaser->id);

        $dbcpas_teaser = $dbcpas_teaser->toArray();
        $this->assertModelData($cpasTeaser->toArray(), $dbcpas_teaser);
    }

    /**
     * @test update
     */
    public function test_update_cpas_teaser()
    {
        $cpasTeaser = cpas_teaser::factory()->create();
        $fakecpas_teaser = cpas_teaser::factory()->make()->toArray();

        $updatedcpas_teaser = $this->cpasTeaserRepo->update($fakecpas_teaser, $cpasTeaser->id);

        $this->assertModelData($fakecpas_teaser, $updatedcpas_teaser->toArray());
        $dbcpas_teaser = $this->cpasTeaserRepo->find($cpasTeaser->id);
        $this->assertModelData($fakecpas_teaser, $dbcpas_teaser->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cpas_teaser()
    {
        $cpasTeaser = cpas_teaser::factory()->create();

        $resp = $this->cpasTeaserRepo->delete($cpasTeaser->id);

        $this->assertTrue($resp);
        $this->assertNull(cpas_teaser::find($cpasTeaser->id), 'cpas_teaser should not exist in DB');
    }
}
