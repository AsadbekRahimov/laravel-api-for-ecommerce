<?php namespace Tests\Repositories;

use App\Models\menu_image;
use App\Repositories\menu_imageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class menu_imageRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var menu_imageRepository
     */
    protected $menuImageRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->menuImageRepo = \App::make(menu_imageRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_menu_image()
    {
        $menuImage = menu_image::factory()->make()->toArray();

        $createdmenu_image = $this->menuImageRepo->create($menuImage);

        $createdmenu_image = $createdmenu_image->toArray();
        $this->assertArrayHasKey('id', $createdmenu_image);
        $this->assertNotNull($createdmenu_image['id'], 'Created menu_image must have id specified');
        $this->assertNotNull(menu_image::find($createdmenu_image['id']), 'menu_image with given id must be in DB');
        $this->assertModelData($menuImage, $createdmenu_image);
    }

    /**
     * @test read
     */
    public function test_read_menu_image()
    {
        $menuImage = menu_image::factory()->create();

        $dbmenu_image = $this->menuImageRepo->find($menuImage->id);

        $dbmenu_image = $dbmenu_image->toArray();
        $this->assertModelData($menuImage->toArray(), $dbmenu_image);
    }

    /**
     * @test update
     */
    public function test_update_menu_image()
    {
        $menuImage = menu_image::factory()->create();
        $fakemenu_image = menu_image::factory()->make()->toArray();

        $updatedmenu_image = $this->menuImageRepo->update($fakemenu_image, $menuImage->id);

        $this->assertModelData($fakemenu_image, $updatedmenu_image->toArray());
        $dbmenu_image = $this->menuImageRepo->find($menuImage->id);
        $this->assertModelData($fakemenu_image, $dbmenu_image->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_menu_image()
    {
        $menuImage = menu_image::factory()->create();

        $resp = $this->menuImageRepo->delete($menuImage->id);

        $this->assertTrue($resp);
        $this->assertNull(menu_image::find($menuImage->id), 'menu_image should not exist in DB');
    }
}
