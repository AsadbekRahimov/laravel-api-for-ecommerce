<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\core_transact;

class core_transactApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_core_transact()
    {
        $coreTransact = core_transact::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/core_transacts', $coreTransact
        );

        $this->assertApiResponse($coreTransact);
    }

    /**
     * @test
     */
    public function test_read_core_transact()
    {
        $coreTransact = core_transact::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/core_transacts/'.$coreTransact->id
        );

        $this->assertApiResponse($coreTransact->toArray());
    }

    /**
     * @test
     */
    public function test_update_core_transact()
    {
        $coreTransact = core_transact::factory()->create();
        $editedcore_transact = core_transact::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/core_transacts/'.$coreTransact->id,
            $editedcore_transact
        );

        $this->assertApiResponse($editedcore_transact);
    }

    /**
     * @test
     */
    public function test_delete_core_transact()
    {
        $coreTransact = core_transact::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/core_transacts/'.$coreTransact->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/core_transacts/'.$coreTransact->id
        );

        $this->response->assertStatus(404);
    }
}
