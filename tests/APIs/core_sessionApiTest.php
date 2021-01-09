<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\core_session;

class core_sessionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_core_session()
    {
        $coreSession = core_session::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/core_sessions', $coreSession
        );

        $this->assertApiResponse($coreSession);
    }

    /**
     * @test
     */
    public function test_read_core_session()
    {
        $coreSession = core_session::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/core_sessions/'.$coreSession->id
        );

        $this->assertApiResponse($coreSession->toArray());
    }

    /**
     * @test
     */
    public function test_update_core_session()
    {
        $coreSession = core_session::factory()->create();
        $editedcore_session = core_session::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/core_sessions/'.$coreSession->id,
            $editedcore_session
        );

        $this->assertApiResponse($editedcore_session);
    }

    /**
     * @test
     */
    public function test_delete_core_session()
    {
        $coreSession = core_session::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/core_sessions/'.$coreSession->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/core_sessions/'.$coreSession->id
        );

        $this->response->assertStatus(404);
    }
}
