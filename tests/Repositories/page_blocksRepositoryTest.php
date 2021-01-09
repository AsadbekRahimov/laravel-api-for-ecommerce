<?php namespace Tests\Repositories;

use App\Models\page_blocks;
use App\Repositories\page_blocksRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class page_blocksRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var page_blocksRepository
     */
    protected $pageBlocksRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pageBlocksRepo = \App::make(page_blocksRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_page_blocks()
    {
        $pageBlocks = page_blocks::factory()->make()->toArray();

        $createdpage_blocks = $this->pageBlocksRepo->create($pageBlocks);

        $createdpage_blocks = $createdpage_blocks->toArray();
        $this->assertArrayHasKey('id', $createdpage_blocks);
        $this->assertNotNull($createdpage_blocks['id'], 'Created page_blocks must have id specified');
        $this->assertNotNull(page_blocks::find($createdpage_blocks['id']), 'page_blocks with given id must be in DB');
        $this->assertModelData($pageBlocks, $createdpage_blocks);
    }

    /**
     * @test read
     */
    public function test_read_page_blocks()
    {
        $pageBlocks = page_blocks::factory()->create();

        $dbpage_blocks = $this->pageBlocksRepo->find($pageBlocks->id);

        $dbpage_blocks = $dbpage_blocks->toArray();
        $this->assertModelData($pageBlocks->toArray(), $dbpage_blocks);
    }

    /**
     * @test update
     */
    public function test_update_page_blocks()
    {
        $pageBlocks = page_blocks::factory()->create();
        $fakepage_blocks = page_blocks::factory()->make()->toArray();

        $updatedpage_blocks = $this->pageBlocksRepo->update($fakepage_blocks, $pageBlocks->id);

        $this->assertModelData($fakepage_blocks, $updatedpage_blocks->toArray());
        $dbpage_blocks = $this->pageBlocksRepo->find($pageBlocks->id);
        $this->assertModelData($fakepage_blocks, $dbpage_blocks->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_page_blocks()
    {
        $pageBlocks = page_blocks::factory()->create();

        $resp = $this->pageBlocksRepo->delete($pageBlocks->id);

        $this->assertTrue($resp);
        $this->assertNull(page_blocks::find($pageBlocks->id), 'page_blocks should not exist in DB');
    }
}
