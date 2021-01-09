<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\drag_form;

class drag_formApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_drag_form()
    {
        $dragForm = drag_form::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/drag_forms', $dragForm
        );

        $this->assertApiResponse($dragForm);
    }

    /**
     * @test
     */
    public function test_read_drag_form()
    {
        $dragForm = drag_form::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/drag_forms/'.$dragForm->id
        );

        $this->assertApiResponse($dragForm->toArray());
    }

    /**
     * @test
     */
    public function test_update_drag_form()
    {
        $dragForm = drag_form::factory()->create();
        $editeddrag_form = drag_form::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/drag_forms/'.$dragForm->id,
            $editeddrag_form
        );

        $this->assertApiResponse($editeddrag_form);
    }

    /**
     * @test
     */
    public function test_delete_drag_form()
    {
        $dragForm = drag_form::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/drag_forms/'.$dragForm->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/drag_forms/'.$dragForm->id
        );

        $this->response->assertStatus(404);
    }
}
