<?php namespace Tests\Repositories;

use App\Models\govs_degree;
use App\Repositories\govs_degreeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class govs_degreeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var govs_degreeRepository
     */
    protected $govsDegreeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->govsDegreeRepo = \App::make(govs_degreeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_govs_degree()
    {
        $govsDegree = govs_degree::factory()->make()->toArray();

        $createdgovs_degree = $this->govsDegreeRepo->create($govsDegree);

        $createdgovs_degree = $createdgovs_degree->toArray();
        $this->assertArrayHasKey('id', $createdgovs_degree);
        $this->assertNotNull($createdgovs_degree['id'], 'Created govs_degree must have id specified');
        $this->assertNotNull(govs_degree::find($createdgovs_degree['id']), 'govs_degree with given id must be in DB');
        $this->assertModelData($govsDegree, $createdgovs_degree);
    }

    /**
     * @test read
     */
    public function test_read_govs_degree()
    {
        $govsDegree = govs_degree::factory()->create();

        $dbgovs_degree = $this->govsDegreeRepo->find($govsDegree->id);

        $dbgovs_degree = $dbgovs_degree->toArray();
        $this->assertModelData($govsDegree->toArray(), $dbgovs_degree);
    }

    /**
     * @test update
     */
    public function test_update_govs_degree()
    {
        $govsDegree = govs_degree::factory()->create();
        $fakegovs_degree = govs_degree::factory()->make()->toArray();

        $updatedgovs_degree = $this->govsDegreeRepo->update($fakegovs_degree, $govsDegree->id);

        $this->assertModelData($fakegovs_degree, $updatedgovs_degree->toArray());
        $dbgovs_degree = $this->govsDegreeRepo->find($govsDegree->id);
        $this->assertModelData($fakegovs_degree, $dbgovs_degree->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_govs_degree()
    {
        $govsDegree = govs_degree::factory()->create();

        $resp = $this->govsDegreeRepo->delete($govsDegree->id);

        $this->assertTrue($resp);
        $this->assertNull(govs_degree::find($govsDegree->id), 'govs_degree should not exist in DB');
    }
}
