<?php namespace Tests\Repositories;

use App\Models\core_main;
use App\Repositories\core_mainRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class core_mainRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var core_mainRepository
     */
    protected $coreMainRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coreMainRepo = \App::make(core_mainRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_core_main()
    {
        $coreMain = core_main::factory()->make()->toArray();

        $createdcore_main = $this->coreMainRepo->create($coreMain);

        $createdcore_main = $createdcore_main->toArray();
        $this->assertArrayHasKey('id', $createdcore_main);
        $this->assertNotNull($createdcore_main['id'], 'Created core_main must have id specified');
        $this->assertNotNull(core_main::find($createdcore_main['id']), 'core_main with given id must be in DB');
        $this->assertModelData($coreMain, $createdcore_main);
    }

    /**
     * @test read
     */
    public function test_read_core_main()
    {
        $coreMain = core_main::factory()->create();

        $dbcore_main = $this->coreMainRepo->find($coreMain->id);

        $dbcore_main = $dbcore_main->toArray();
        $this->assertModelData($coreMain->toArray(), $dbcore_main);
    }

    /**
     * @test update
     */
    public function test_update_core_main()
    {
        $coreMain = core_main::factory()->create();
        $fakecore_main = core_main::factory()->make()->toArray();

        $updatedcore_main = $this->coreMainRepo->update($fakecore_main, $coreMain->id);

        $this->assertModelData($fakecore_main, $updatedcore_main->toArray());
        $dbcore_main = $this->coreMainRepo->find($coreMain->id);
        $this->assertModelData($fakecore_main, $dbcore_main->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_core_main()
    {
        $coreMain = core_main::factory()->create();

        $resp = $this->coreMainRepo->delete($coreMain->id);

        $this->assertTrue($resp);
        $this->assertNull(core_main::find($coreMain->id), 'core_main should not exist in DB');
    }
}
