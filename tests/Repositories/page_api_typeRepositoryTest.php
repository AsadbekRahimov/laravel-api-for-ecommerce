<?php namespace Tests\Repositories;

use App\Models\page_api_type;
use App\Repositories\page_api_typeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class page_api_typeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var page_api_typeRepository
     */
    protected $pageApiTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pageApiTypeRepo = \App::make(page_api_typeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_page_api_type()
    {
        $pageApiType = page_api_type::factory()->make()->toArray();

        $createdpage_api_type = $this->pageApiTypeRepo->create($pageApiType);

        $createdpage_api_type = $createdpage_api_type->toArray();
        $this->assertArrayHasKey('id', $createdpage_api_type);
        $this->assertNotNull($createdpage_api_type['id'], 'Created page_api_type must have id specified');
        $this->assertNotNull(page_api_type::find($createdpage_api_type['id']), 'page_api_type with given id must be in DB');
        $this->assertModelData($pageApiType, $createdpage_api_type);
    }

    /**
     * @test read
     */
    public function test_read_page_api_type()
    {
        $pageApiType = page_api_type::factory()->create();

        $dbpage_api_type = $this->pageApiTypeRepo->find($pageApiType->id);

        $dbpage_api_type = $dbpage_api_type->toArray();
        $this->assertModelData($pageApiType->toArray(), $dbpage_api_type);
    }

    /**
     * @test update
     */
    public function test_update_page_api_type()
    {
        $pageApiType = page_api_type::factory()->create();
        $fakepage_api_type = page_api_type::factory()->make()->toArray();

        $updatedpage_api_type = $this->pageApiTypeRepo->update($fakepage_api_type, $pageApiType->id);

        $this->assertModelData($fakepage_api_type, $updatedpage_api_type->toArray());
        $dbpage_api_type = $this->pageApiTypeRepo->find($pageApiType->id);
        $this->assertModelData($fakepage_api_type, $dbpage_api_type->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_page_api_type()
    {
        $pageApiType = page_api_type::factory()->create();

        $resp = $this->pageApiTypeRepo->delete($pageApiType->id);

        $this->assertTrue($resp);
        $this->assertNull(page_api_type::find($pageApiType->id), 'page_api_type should not exist in DB');
    }
}
