<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\menu_image;

class menu_imageApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_menu_image()
    {
        $menuImage = menu_image::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/menu_images', $menuImage
        );

        $this->assertApiResponse($menuImage);
    }

    /**
     * @test
     */
    public function test_read_menu_image()
    {
        $menuImage = menu_image::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/menu_images/'.$menuImage->id
        );

        $this->assertApiResponse($menuImage->toArray());
    }

    /**
     * @test
     */
    public function test_update_menu_image()
    {
        $menuImage = menu_image::factory()->create();
        $editedmenu_image = menu_image::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/menu_images/'.$menuImage->id,
            $editedmenu_image
        );

        $this->assertApiResponse($editedmenu_image);
    }

    /**
     * @test
     */
    public function test_delete_menu_image()
    {
        $menuImage = menu_image::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/menu_images/'.$menuImage->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/menu_images/'.$menuImage->id
        );

        $this->response->assertStatus(404);
    }
}
