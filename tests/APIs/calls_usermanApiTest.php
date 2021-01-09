<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_userman;

class calls_usermanApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_userman()
    {
        $callsUserman = calls_userman::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_usermen', $callsUserman
        );

        $this->assertApiResponse($callsUserman);
    }

    /**
     * @test
     */
    public function test_read_calls_userman()
    {
        $callsUserman = calls_userman::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_usermen/'.$callsUserman->id
        );

        $this->assertApiResponse($callsUserman->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_userman()
    {
        $callsUserman = calls_userman::factory()->create();
        $editedcalls_userman = calls_userman::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_usermen/'.$callsUserman->id,
            $editedcalls_userman
        );

        $this->assertApiResponse($editedcalls_userman);
    }

    /**
     * @test
     */
    public function test_delete_calls_userman()
    {
        $callsUserman = calls_userman::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_usermen/'.$callsUserman->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_usermen/'.$callsUserman->id
        );

        $this->response->assertStatus(404);
    }
}
