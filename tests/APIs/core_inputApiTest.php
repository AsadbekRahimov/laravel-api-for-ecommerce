<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\core_input;

class core_inputApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_core_input()
    {
        $coreInput = core_input::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/core_inputs', $coreInput
        );

        $this->assertApiResponse($coreInput);
    }

    /**
     * @test
     */
    public function test_read_core_input()
    {
        $coreInput = core_input::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/core_inputs/'.$coreInput->id
        );

        $this->assertApiResponse($coreInput->toArray());
    }

    /**
     * @test
     */
    public function test_update_core_input()
    {
        $coreInput = core_input::factory()->create();
        $editedcore_input = core_input::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/core_inputs/'.$coreInput->id,
            $editedcore_input
        );

        $this->assertApiResponse($editedcore_input);
    }

    /**
     * @test
     */
    public function test_delete_core_input()
    {
        $coreInput = core_input::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/core_inputs/'.$coreInput->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/core_inputs/'.$coreInput->id
        );

        $this->response->assertStatus(404);
    }
}
