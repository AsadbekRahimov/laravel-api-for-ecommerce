<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\dyna_dynagrid_dtl;

class dyna_dynagrid_dtlApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dyna_dynagrid_dtl()
    {
        $dynaDynagridDtl = dyna_dynagrid_dtl::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dyna_dynagrid_dtls', $dynaDynagridDtl
        );

        $this->assertApiResponse($dynaDynagridDtl);
    }

    /**
     * @test
     */
    public function test_read_dyna_dynagrid_dtl()
    {
        $dynaDynagridDtl = dyna_dynagrid_dtl::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dyna_dynagrid_dtls/'.$dynaDynagridDtl->id
        );

        $this->assertApiResponse($dynaDynagridDtl->toArray());
    }

    /**
     * @test
     */
    public function test_update_dyna_dynagrid_dtl()
    {
        $dynaDynagridDtl = dyna_dynagrid_dtl::factory()->create();
        $editeddyna_dynagrid_dtl = dyna_dynagrid_dtl::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dyna_dynagrid_dtls/'.$dynaDynagridDtl->id,
            $editeddyna_dynagrid_dtl
        );

        $this->assertApiResponse($editeddyna_dynagrid_dtl);
    }

    /**
     * @test
     */
    public function test_delete_dyna_dynagrid_dtl()
    {
        $dynaDynagridDtl = dyna_dynagrid_dtl::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dyna_dynagrid_dtls/'.$dynaDynagridDtl->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dyna_dynagrid_dtls/'.$dynaDynagridDtl->id
        );

        $this->response->assertStatus(404);
    }
}
