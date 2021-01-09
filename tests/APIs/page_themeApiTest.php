<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\page_theme;

class page_themeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_page_theme()
    {
        $pageTheme = page_theme::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/page_themes', $pageTheme
        );

        $this->assertApiResponse($pageTheme);
    }

    /**
     * @test
     */
    public function test_read_page_theme()
    {
        $pageTheme = page_theme::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/page_themes/'.$pageTheme->id
        );

        $this->assertApiResponse($pageTheme->toArray());
    }

    /**
     * @test
     */
    public function test_update_page_theme()
    {
        $pageTheme = page_theme::factory()->create();
        $editedpage_theme = page_theme::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/page_themes/'.$pageTheme->id,
            $editedpage_theme
        );

        $this->assertApiResponse($editedpage_theme);
    }

    /**
     * @test
     */
    public function test_delete_page_theme()
    {
        $pageTheme = page_theme::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/page_themes/'.$pageTheme->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/page_themes/'.$pageTheme->id
        );

        $this->response->assertStatus(404);
    }
}
