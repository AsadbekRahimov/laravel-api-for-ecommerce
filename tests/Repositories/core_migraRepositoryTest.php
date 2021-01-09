<?php namespace Tests\Repositories;

use App\Models\core_migra;
use App\Repositories\core_migraRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class core_migraRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var core_migraRepository
     */
    protected $coreMigraRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coreMigraRepo = \App::make(core_migraRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_core_migra()
    {
        $coreMigra = core_migra::factory()->make()->toArray();

        $createdcore_migra = $this->coreMigraRepo->create($coreMigra);

        $createdcore_migra = $createdcore_migra->toArray();
        $this->assertArrayHasKey('id', $createdcore_migra);
        $this->assertNotNull($createdcore_migra['id'], 'Created core_migra must have id specified');
        $this->assertNotNull(core_migra::find($createdcore_migra['id']), 'core_migra with given id must be in DB');
        $this->assertModelData($coreMigra, $createdcore_migra);
    }

    /**
     * @test read
     */
    public function test_read_core_migra()
    {
        $coreMigra = core_migra::factory()->create();

        $dbcore_migra = $this->coreMigraRepo->find($coreMigra->id);

        $dbcore_migra = $dbcore_migra->toArray();
        $this->assertModelData($coreMigra->toArray(), $dbcore_migra);
    }

    /**
     * @test update
     */
    public function test_update_core_migra()
    {
        $coreMigra = core_migra::factory()->create();
        $fakecore_migra = core_migra::factory()->make()->toArray();

        $updatedcore_migra = $this->coreMigraRepo->update($fakecore_migra, $coreMigra->id);

        $this->assertModelData($fakecore_migra, $updatedcore_migra->toArray());
        $dbcore_migra = $this->coreMigraRepo->find($coreMigra->id);
        $this->assertModelData($fakecore_migra, $dbcore_migra->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_core_migra()
    {
        $coreMigra = core_migra::factory()->create();

        $resp = $this->coreMigraRepo->delete($coreMigra->id);

        $this->assertTrue($resp);
        $this->assertNull(core_migra::find($coreMigra->id), 'core_migra should not exist in DB');
    }
}
