<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\dyna_multi;

class dyna_multiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dyna_multi()
    {
        $dynaMulti = dyna_multi::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dyna_multis', $dynaMulti
        );

        $this->assertApiResponse($dynaMulti);
    }

    /**
     * @test
     */
    public function test_read_dyna_multi()
    {
        $dynaMulti = dyna_multi::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dyna_multis/'.$dynaMulti->id
        );

        $this->assertApiResponse($dynaMulti->toArray());
    }

    /**
     * @test
     */
    public function test_update_dyna_multi()
    {
        $dynaMulti = dyna_multi::factory()->create();
        $editeddyna_multi = dyna_multi::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dyna_multis/'.$dynaMulti->id,
            $editeddyna_multi
        );

        $this->assertApiResponse($editeddyna_multi);
    }

    /**
     * @test
     */
    public function test_delete_dyna_multi()
    {
        $dynaMulti = dyna_multi::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dyna_multis/'.$dynaMulti->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dyna_multis/'.$dynaMulti->id
        );

        $this->response->assertStatus(404);
    }
}
