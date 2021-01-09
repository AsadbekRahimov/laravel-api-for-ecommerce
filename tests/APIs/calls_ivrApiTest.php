<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_ivr;

class calls_ivrApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_ivr()
    {
        $callsIvr = calls_ivr::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_ivrs', $callsIvr
        );

        $this->assertApiResponse($callsIvr);
    }

    /**
     * @test
     */
    public function test_read_calls_ivr()
    {
        $callsIvr = calls_ivr::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_ivrs/'.$callsIvr->id
        );

        $this->assertApiResponse($callsIvr->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_ivr()
    {
        $callsIvr = calls_ivr::factory()->create();
        $editedcalls_ivr = calls_ivr::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_ivrs/'.$callsIvr->id,
            $editedcalls_ivr
        );

        $this->assertApiResponse($editedcalls_ivr);
    }

    /**
     * @test
     */
    public function test_delete_calls_ivr()
    {
        $callsIvr = calls_ivr::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_ivrs/'.$callsIvr->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_ivrs/'.$callsIvr->id
        );

        $this->response->assertStatus(404);
    }
}
