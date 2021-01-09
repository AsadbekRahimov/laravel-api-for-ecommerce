<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cpas_teaser;

class cpas_teaserApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cpas_teaser()
    {
        $cpasTeaser = cpas_teaser::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cpas_teasers', $cpasTeaser
        );

        $this->assertApiResponse($cpasTeaser);
    }

    /**
     * @test
     */
    public function test_read_cpas_teaser()
    {
        $cpasTeaser = cpas_teaser::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cpas_teasers/'.$cpasTeaser->id
        );

        $this->assertApiResponse($cpasTeaser->toArray());
    }

    /**
     * @test
     */
    public function test_update_cpas_teaser()
    {
        $cpasTeaser = cpas_teaser::factory()->create();
        $editedcpas_teaser = cpas_teaser::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cpas_teasers/'.$cpasTeaser->id,
            $editedcpas_teaser
        );

        $this->assertApiResponse($editedcpas_teaser);
    }

    /**
     * @test
     */
    public function test_delete_cpas_teaser()
    {
        $cpasTeaser = cpas_teaser::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cpas_teasers/'.$cpasTeaser->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cpas_teasers/'.$cpasTeaser->id
        );

        $this->response->assertStatus(404);
    }
}
