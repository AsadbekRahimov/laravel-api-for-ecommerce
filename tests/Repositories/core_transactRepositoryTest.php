<?php namespace Tests\Repositories;

use App\Models\core_transact;
use App\Repositories\core_transactRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class core_transactRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var core_transactRepository
     */
    protected $coreTransactRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coreTransactRepo = \App::make(core_transactRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_core_transact()
    {
        $coreTransact = core_transact::factory()->make()->toArray();

        $createdcore_transact = $this->coreTransactRepo->create($coreTransact);

        $createdcore_transact = $createdcore_transact->toArray();
        $this->assertArrayHasKey('id', $createdcore_transact);
        $this->assertNotNull($createdcore_transact['id'], 'Created core_transact must have id specified');
        $this->assertNotNull(core_transact::find($createdcore_transact['id']), 'core_transact with given id must be in DB');
        $this->assertModelData($coreTransact, $createdcore_transact);
    }

    /**
     * @test read
     */
    public function test_read_core_transact()
    {
        $coreTransact = core_transact::factory()->create();

        $dbcore_transact = $this->coreTransactRepo->find($coreTransact->id);

        $dbcore_transact = $dbcore_transact->toArray();
        $this->assertModelData($coreTransact->toArray(), $dbcore_transact);
    }

    /**
     * @test update
     */
    public function test_update_core_transact()
    {
        $coreTransact = core_transact::factory()->create();
        $fakecore_transact = core_transact::factory()->make()->toArray();

        $updatedcore_transact = $this->coreTransactRepo->update($fakecore_transact, $coreTransact->id);

        $this->assertModelData($fakecore_transact, $updatedcore_transact->toArray());
        $dbcore_transact = $this->coreTransactRepo->find($coreTransact->id);
        $this->assertModelData($fakecore_transact, $dbcore_transact->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_core_transact()
    {
        $coreTransact = core_transact::factory()->create();

        $resp = $this->coreTransactRepo->delete($coreTransact->id);

        $this->assertTrue($resp);
        $this->assertNull(core_transact::find($coreTransact->id), 'core_transact should not exist in DB');
    }
}
