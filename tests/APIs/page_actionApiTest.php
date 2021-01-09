<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\page_action;

class page_actionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_page_action()
    {
        $pageAction = page_action::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/page_actions', $pageAction
        );

        $this->assertApiResponse($pageAction);
    }

    /**
     * @test
     */
    public function test_read_page_action()
    {
        $pageAction = page_action::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/page_actions/'.$pageAction->id
        );

        $this->assertApiResponse($pageAction->toArray());
    }

    /**
     * @test
     */
    public function test_update_page_action()
    {
        $pageAction = page_action::factory()->create();
        $editedpage_action = page_action::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/page_actions/'.$pageAction->id,
            $editedpage_action
        );

        $this->assertApiResponse($editedpage_action);
    }

    /**
     * @test
     */
    public function test_delete_page_action()
    {
        $pageAction = page_action::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/page_actions/'.$pageAction->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/page_actions/'.$pageAction->id
        );

        $this->response->assertStatus(404);
    }
}
