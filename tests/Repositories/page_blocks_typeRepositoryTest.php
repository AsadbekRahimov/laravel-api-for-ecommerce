<?php namespace Tests\Repositories;

use App\Models\page_blocks_type;
use App\Repositories\page_blocks_typeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class page_blocks_typeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var page_blocks_typeRepository
     */
    protected $pageBlocksTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pageBlocksTypeRepo = \App::make(page_blocks_typeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_page_blocks_type()
    {
        $pageBlocksType = page_blocks_type::factory()->make()->toArray();

        $createdpage_blocks_type = $this->pageBlocksTypeRepo->create($pageBlocksType);

        $createdpage_blocks_type = $createdpage_blocks_type->toArray();
        $this->assertArrayHasKey('id', $createdpage_blocks_type);
        $this->assertNotNull($createdpage_blocks_type['id'], 'Created page_blocks_type must have id specified');
        $this->assertNotNull(page_blocks_type::find($createdpage_blocks_type['id']), 'page_blocks_type with given id must be in DB');
        $this->assertModelData($pageBlocksType, $createdpage_blocks_type);
    }

    /**
     * @test read
     */
    public function test_read_page_blocks_type()
    {
        $pageBlocksType = page_blocks_type::factory()->create();

        $dbpage_blocks_type = $this->pageBlocksTypeRepo->find($pageBlocksType->id);

        $dbpage_blocks_type = $dbpage_blocks_type->toArray();
        $this->assertModelData($pageBlocksType->toArray(), $dbpage_blocks_type);
    }

    /**
     * @test update
     */
    public function test_update_page_blocks_type()
    {
        $pageBlocksType = page_blocks_type::factory()->create();
        $fakepage_blocks_type = page_blocks_type::factory()->make()->toArray();

        $updatedpage_blocks_type = $this->pageBlocksTypeRepo->update($fakepage_blocks_type, $pageBlocksType->id);

        $this->assertModelData($fakepage_blocks_type, $updatedpage_blocks_type->toArray());
        $dbpage_blocks_type = $this->pageBlocksTypeRepo->find($pageBlocksType->id);
        $this->assertModelData($fakepage_blocks_type, $dbpage_blocks_type->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_page_blocks_type()
    {
        $pageBlocksType = page_blocks_type::factory()->create();

        $resp = $this->pageBlocksTypeRepo->delete($pageBlocksType->id);

        $this->assertTrue($resp);
        $this->assertNull(page_blocks_type::find($pageBlocksType->id), 'page_blocks_type should not exist in DB');
    }
}
