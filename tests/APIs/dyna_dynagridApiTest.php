<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\dyna_dynagrid;

class dyna_dynagridApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dyna_dynagrid()
    {
        $dynaDynagrid = dyna_dynagrid::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dyna_dynagrids', $dynaDynagrid
        );

        $this->assertApiResponse($dynaDynagrid);
    }

    /**
     * @test
     */
    public function test_read_dyna_dynagrid()
    {
        $dynaDynagrid = dyna_dynagrid::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dyna_dynagrids/'.$dynaDynagrid->id
        );

        $this->assertApiResponse($dynaDynagrid->toArray());
    }

    /**
     * @test
     */
    public function test_update_dyna_dynagrid()
    {
        $dynaDynagrid = dyna_dynagrid::factory()->create();
        $editeddyna_dynagrid = dyna_dynagrid::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dyna_dynagrids/'.$dynaDynagrid->id,
            $editeddyna_dynagrid
        );

        $this->assertApiResponse($editeddyna_dynagrid);
    }

    /**
     * @test
     */
    public function test_delete_dyna_dynagrid()
    {
        $dynaDynagrid = dyna_dynagrid::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dyna_dynagrids/'.$dynaDynagrid->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dyna_dynagrids/'.$dynaDynagrid->id
        );

        $this->response->assertStatus(404);
    }
}
