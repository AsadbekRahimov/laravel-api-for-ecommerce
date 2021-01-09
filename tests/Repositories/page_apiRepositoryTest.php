<?php namespace Tests\Repositories;

use App\Models\page_api;
use App\Repositories\page_apiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class page_apiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var page_apiRepository
     */
    protected $pageApiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pageApiRepo = \App::make(page_apiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_page_api()
    {
        $pageApi = page_api::factory()->make()->toArray();

        $createdpage_api = $this->pageApiRepo->create($pageApi);

        $createdpage_api = $createdpage_api->toArray();
        $this->assertArrayHasKey('id', $createdpage_api);
        $this->assertNotNull($createdpage_api['id'], 'Created page_api must have id specified');
        $this->assertNotNull(page_api::find($createdpage_api['id']), 'page_api with given id must be in DB');
        $this->assertModelData($pageApi, $createdpage_api);
    }

    /**
     * @test read
     */
    public function test_read_page_api()
    {
        $pageApi = page_api::factory()->create();

        $dbpage_api = $this->pageApiRepo->find($pageApi->id);

        $dbpage_api = $dbpage_api->toArray();
        $this->assertModelData($pageApi->toArray(), $dbpage_api);
    }

    /**
     * @test update
     */
    public function test_update_page_api()
    {
        $pageApi = page_api::factory()->create();
        $fakepage_api = page_api::factory()->make()->toArray();

        $updatedpage_api = $this->pageApiRepo->update($fakepage_api, $pageApi->id);

        $this->assertModelData($fakepage_api, $updatedpage_api->toArray());
        $dbpage_api = $this->pageApiRepo->find($pageApi->id);
        $this->assertModelData($fakepage_api, $dbpage_api->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_page_api()
    {
        $pageApi = page_api::factory()->create();

        $resp = $this->pageApiRepo->delete($pageApi->id);

        $this->assertTrue($resp);
        $this->assertNull(page_api::find($pageApi->id), 'page_api should not exist in DB');
    }
}
