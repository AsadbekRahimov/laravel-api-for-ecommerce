<?php namespace Tests\Repositories;

use App\Models\drag_app;
use App\Repositories\drag_appRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class drag_appRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var drag_appRepository
     */
    protected $dragAppRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dragAppRepo = \App::make(drag_appRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_drag_app()
    {
        $dragApp = drag_app::factory()->make()->toArray();

        $createddrag_app = $this->dragAppRepo->create($dragApp);

        $createddrag_app = $createddrag_app->toArray();
        $this->assertArrayHasKey('id', $createddrag_app);
        $this->assertNotNull($createddrag_app['id'], 'Created drag_app must have id specified');
        $this->assertNotNull(drag_app::find($createddrag_app['id']), 'drag_app with given id must be in DB');
        $this->assertModelData($dragApp, $createddrag_app);
    }

    /**
     * @test read
     */
    public function test_read_drag_app()
    {
        $dragApp = drag_app::factory()->create();

        $dbdrag_app = $this->dragAppRepo->find($dragApp->id);

        $dbdrag_app = $dbdrag_app->toArray();
        $this->assertModelData($dragApp->toArray(), $dbdrag_app);
    }

    /**
     * @test update
     */
    public function test_update_drag_app()
    {
        $dragApp = drag_app::factory()->create();
        $fakedrag_app = drag_app::factory()->make()->toArray();

        $updateddrag_app = $this->dragAppRepo->update($fakedrag_app, $dragApp->id);

        $this->assertModelData($fakedrag_app, $updateddrag_app->toArray());
        $dbdrag_app = $this->dragAppRepo->find($dragApp->id);
        $this->assertModelData($fakedrag_app, $dbdrag_app->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_drag_app()
    {
        $dragApp = drag_app::factory()->create();

        $resp = $this->dragAppRepo->delete($dragApp->id);

        $this->assertTrue($resp);
        $this->assertNull(drag_app::find($dragApp->id), 'drag_app should not exist in DB');
    }
}
