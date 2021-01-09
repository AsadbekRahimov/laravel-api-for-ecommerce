<?php namespace Tests\Repositories;

use App\Models\dyna_multi;
use App\Repositories\dyna_multiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dyna_multiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dyna_multiRepository
     */
    protected $dynaMultiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dynaMultiRepo = \App::make(dyna_multiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dyna_multi()
    {
        $dynaMulti = dyna_multi::factory()->make()->toArray();

        $createddyna_multi = $this->dynaMultiRepo->create($dynaMulti);

        $createddyna_multi = $createddyna_multi->toArray();
        $this->assertArrayHasKey('id', $createddyna_multi);
        $this->assertNotNull($createddyna_multi['id'], 'Created dyna_multi must have id specified');
        $this->assertNotNull(dyna_multi::find($createddyna_multi['id']), 'dyna_multi with given id must be in DB');
        $this->assertModelData($dynaMulti, $createddyna_multi);
    }

    /**
     * @test read
     */
    public function test_read_dyna_multi()
    {
        $dynaMulti = dyna_multi::factory()->create();

        $dbdyna_multi = $this->dynaMultiRepo->find($dynaMulti->id);

        $dbdyna_multi = $dbdyna_multi->toArray();
        $this->assertModelData($dynaMulti->toArray(), $dbdyna_multi);
    }

    /**
     * @test update
     */
    public function test_update_dyna_multi()
    {
        $dynaMulti = dyna_multi::factory()->create();
        $fakedyna_multi = dyna_multi::factory()->make()->toArray();

        $updateddyna_multi = $this->dynaMultiRepo->update($fakedyna_multi, $dynaMulti->id);

        $this->assertModelData($fakedyna_multi, $updateddyna_multi->toArray());
        $dbdyna_multi = $this->dynaMultiRepo->find($dynaMulti->id);
        $this->assertModelData($fakedyna_multi, $dbdyna_multi->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dyna_multi()
    {
        $dynaMulti = dyna_multi::factory()->create();

        $resp = $this->dynaMultiRepo->delete($dynaMulti->id);

        $this->assertTrue($resp);
        $this->assertNull(dyna_multi::find($dynaMulti->id), 'dyna_multi should not exist in DB');
    }
}
