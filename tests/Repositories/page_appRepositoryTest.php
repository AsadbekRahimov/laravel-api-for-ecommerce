<?php namespace Tests\Repositories;

use App\Models\page_app;
use App\Repositories\page_appRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class page_appRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var page_appRepository
     */
    protected $pageAppRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pageAppRepo = \App::make(page_appRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_page_app()
    {
        $pageApp = page_app::factory()->make()->toArray();

        $createdpage_app = $this->pageAppRepo->create($pageApp);

        $createdpage_app = $createdpage_app->toArray();
        $this->assertArrayHasKey('id', $createdpage_app);
        $this->assertNotNull($createdpage_app['id'], 'Created page_app must have id specified');
        $this->assertNotNull(page_app::find($createdpage_app['id']), 'page_app with given id must be in DB');
        $this->assertModelData($pageApp, $createdpage_app);
    }

    /**
     * @test read
     */
    public function test_read_page_app()
    {
        $pageApp = page_app::factory()->create();

        $dbpage_app = $this->pageAppRepo->find($pageApp->id);

        $dbpage_app = $dbpage_app->toArray();
        $this->assertModelData($pageApp->toArray(), $dbpage_app);
    }

    /**
     * @test update
     */
    public function test_update_page_app()
    {
        $pageApp = page_app::factory()->create();
        $fakepage_app = page_app::factory()->make()->toArray();

        $updatedpage_app = $this->pageAppRepo->update($fakepage_app, $pageApp->id);

        $this->assertModelData($fakepage_app, $updatedpage_app->toArray());
        $dbpage_app = $this->pageAppRepo->find($pageApp->id);
        $this->assertModelData($fakepage_app, $dbpage_app->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_page_app()
    {
        $pageApp = page_app::factory()->create();

        $resp = $this->pageAppRepo->delete($pageApp->id);

        $this->assertTrue($resp);
        $this->assertNull(page_app::find($pageApp->id), 'page_app should not exist in DB');
    }
}
