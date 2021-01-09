<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_extens;

class calls_extensApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_extens()
    {
        $callsExtens = calls_extens::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_extens', $callsExtens
        );

        $this->assertApiResponse($callsExtens);
    }

    /**
     * @test
     */
    public function test_read_calls_extens()
    {
        $callsExtens = calls_extens::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_extens/'.$callsExtens->id
        );

        $this->assertApiResponse($callsExtens->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_extens()
    {
        $callsExtens = calls_extens::factory()->create();
        $editedcalls_extens = calls_extens::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_extens/'.$callsExtens->id,
            $editedcalls_extens
        );

        $this->assertApiResponse($editedcalls_extens);
    }

    /**
     * @test
     */
    public function test_delete_calls_extens()
    {
        $callsExtens = calls_extens::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_extens/'.$callsExtens->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_extens/'.$callsExtens->id
        );

        $this->response->assertStatus(404);
    }
}
