<?php namespace Tests\Repositories;

use App\Models\page_theme;
use App\Repositories\page_themeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class page_themeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var page_themeRepository
     */
    protected $pageThemeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pageThemeRepo = \App::make(page_themeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_page_theme()
    {
        $pageTheme = page_theme::factory()->make()->toArray();

        $createdpage_theme = $this->pageThemeRepo->create($pageTheme);

        $createdpage_theme = $createdpage_theme->toArray();
        $this->assertArrayHasKey('id', $createdpage_theme);
        $this->assertNotNull($createdpage_theme['id'], 'Created page_theme must have id specified');
        $this->assertNotNull(page_theme::find($createdpage_theme['id']), 'page_theme with given id must be in DB');
        $this->assertModelData($pageTheme, $createdpage_theme);
    }

    /**
     * @test read
     */
    public function test_read_page_theme()
    {
        $pageTheme = page_theme::factory()->create();

        $dbpage_theme = $this->pageThemeRepo->find($pageTheme->id);

        $dbpage_theme = $dbpage_theme->toArray();
        $this->assertModelData($pageTheme->toArray(), $dbpage_theme);
    }

    /**
     * @test update
     */
    public function test_update_page_theme()
    {
        $pageTheme = page_theme::factory()->create();
        $fakepage_theme = page_theme::factory()->make()->toArray();

        $updatedpage_theme = $this->pageThemeRepo->update($fakepage_theme, $pageTheme->id);

        $this->assertModelData($fakepage_theme, $updatedpage_theme->toArray());
        $dbpage_theme = $this->pageThemeRepo->find($pageTheme->id);
        $this->assertModelData($fakepage_theme, $dbpage_theme->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_page_theme()
    {
        $pageTheme = page_theme::factory()->create();

        $resp = $this->pageThemeRepo->delete($pageTheme->id);

        $this->assertTrue($resp);
        $this->assertNull(page_theme::find($pageTheme->id), 'page_theme should not exist in DB');
    }
}
