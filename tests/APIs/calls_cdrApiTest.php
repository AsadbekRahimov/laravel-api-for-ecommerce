<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_cdr;

class calls_cdrApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_cdr()
    {
        $callsCdr = calls_cdr::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_cdrs', $callsCdr
        );

        $this->assertApiResponse($callsCdr);
    }

    /**
     * @test
     */
    public function test_read_calls_cdr()
    {
        $callsCdr = calls_cdr::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_cdrs/'.$callsCdr->id
        );

        $this->assertApiResponse($callsCdr->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_cdr()
    {
        $callsCdr = calls_cdr::factory()->create();
        $editedcalls_cdr = calls_cdr::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_cdrs/'.$callsCdr->id,
            $editedcalls_cdr
        );

        $this->assertApiResponse($editedcalls_cdr);
    }

    /**
     * @test
     */
    public function test_delete_calls_cdr()
    {
        $callsCdr = calls_cdr::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_cdrs/'.$callsCdr->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_cdrs/'.$callsCdr->id
        );

        $this->response->assertStatus(404);
    }
}
