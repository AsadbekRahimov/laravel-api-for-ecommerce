<?php namespace Tests\Repositories;

use App\Models\dyna_dynagrid;
use App\Repositories\dyna_dynagridRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dyna_dynagridRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dyna_dynagridRepository
     */
    protected $dynaDynagridRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dynaDynagridRepo = \App::make(dyna_dynagridRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dyna_dynagrid()
    {
        $dynaDynagrid = dyna_dynagrid::factory()->make()->toArray();

        $createddyna_dynagrid = $this->dynaDynagridRepo->create($dynaDynagrid);

        $createddyna_dynagrid = $createddyna_dynagrid->toArray();
        $this->assertArrayHasKey('id', $createddyna_dynagrid);
        $this->assertNotNull($createddyna_dynagrid['id'], 'Created dyna_dynagrid must have id specified');
        $this->assertNotNull(dyna_dynagrid::find($createddyna_dynagrid['id']), 'dyna_dynagrid with given id must be in DB');
        $this->assertModelData($dynaDynagrid, $createddyna_dynagrid);
    }

    /**
     * @test read
     */
    public function test_read_dyna_dynagrid()
    {
        $dynaDynagrid = dyna_dynagrid::factory()->create();

        $dbdyna_dynagrid = $this->dynaDynagridRepo->find($dynaDynagrid->id);

        $dbdyna_dynagrid = $dbdyna_dynagrid->toArray();
        $this->assertModelData($dynaDynagrid->toArray(), $dbdyna_dynagrid);
    }

    /**
     * @test update
     */
    public function test_update_dyna_dynagrid()
    {
        $dynaDynagrid = dyna_dynagrid::factory()->create();
        $fakedyna_dynagrid = dyna_dynagrid::factory()->make()->toArray();

        $updateddyna_dynagrid = $this->dynaDynagridRepo->update($fakedyna_dynagrid, $dynaDynagrid->id);

        $this->assertModelData($fakedyna_dynagrid, $updateddyna_dynagrid->toArray());
        $dbdyna_dynagrid = $this->dynaDynagridRepo->find($dynaDynagrid->id);
        $this->assertModelData($fakedyna_dynagrid, $dbdyna_dynagrid->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dyna_dynagrid()
    {
        $dynaDynagrid = dyna_dynagrid::factory()->create();

        $resp = $this->dynaDynagridRepo->delete($dynaDynagrid->id);

        $this->assertTrue($resp);
        $this->assertNull(dyna_dynagrid::find($dynaDynagrid->id), 'dyna_dynagrid should not exist in DB');
    }
}
