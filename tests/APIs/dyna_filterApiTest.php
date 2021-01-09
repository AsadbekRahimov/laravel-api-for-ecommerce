<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\dyna_filter;

class dyna_filterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dyna_filter()
    {
        $dynaFilter = dyna_filter::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dyna_filters', $dynaFilter
        );

        $this->assertApiResponse($dynaFilter);
    }

    /**
     * @test
     */
    public function test_read_dyna_filter()
    {
        $dynaFilter = dyna_filter::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dyna_filters/'.$dynaFilter->id
        );

        $this->assertApiResponse($dynaFilter->toArray());
    }

    /**
     * @test
     */
    public function test_update_dyna_filter()
    {
        $dynaFilter = dyna_filter::factory()->create();
        $editeddyna_filter = dyna_filter::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dyna_filters/'.$dynaFilter->id,
            $editeddyna_filter
        );

        $this->assertApiResponse($editeddyna_filter);
    }

    /**
     * @test
     */
    public function test_delete_dyna_filter()
    {
        $dynaFilter = dyna_filter::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dyna_filters/'.$dynaFilter->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dyna_filters/'.$dynaFilter->id
        );

        $this->response->assertStatus(404);
    }
}
