<?php namespace Tests\Repositories;

use App\Models\core_session;
use App\Repositories\core_sessionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class core_sessionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var core_sessionRepository
     */
    protected $coreSessionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coreSessionRepo = \App::make(core_sessionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_core_session()
    {
        $coreSession = core_session::factory()->make()->toArray();

        $createdcore_session = $this->coreSessionRepo->create($coreSession);

        $createdcore_session = $createdcore_session->toArray();
        $this->assertArrayHasKey('id', $createdcore_session);
        $this->assertNotNull($createdcore_session['id'], 'Created core_session must have id specified');
        $this->assertNotNull(core_session::find($createdcore_session['id']), 'core_session with given id must be in DB');
        $this->assertModelData($coreSession, $createdcore_session);
    }

    /**
     * @test read
     */
    public function test_read_core_session()
    {
        $coreSession = core_session::factory()->create();

        $dbcore_session = $this->coreSessionRepo->find($coreSession->id);

        $dbcore_session = $dbcore_session->toArray();
        $this->assertModelData($coreSession->toArray(), $dbcore_session);
    }

    /**
     * @test update
     */
    public function test_update_core_session()
    {
        $coreSession = core_session::factory()->create();
        $fakecore_session = core_session::factory()->make()->toArray();

        $updatedcore_session = $this->coreSessionRepo->update($fakecore_session, $coreSession->id);

        $this->assertModelData($fakecore_session, $updatedcore_session->toArray());
        $dbcore_session = $this->coreSessionRepo->find($coreSession->id);
        $this->assertModelData($fakecore_session, $dbcore_session->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_core_session()
    {
        $coreSession = core_session::factory()->create();

        $resp = $this->coreSessionRepo->delete($coreSession->id);

        $this->assertTrue($resp);
        $this->assertNull(core_session::find($coreSession->id), 'core_session should not exist in DB');
    }
}
