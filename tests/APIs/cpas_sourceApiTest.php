<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cpas_source;

class cpas_sourceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cpas_source()
    {
        $cpasSource = cpas_source::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cpas_sources', $cpasSource
        );

        $this->assertApiResponse($cpasSource);
    }

    /**
     * @test
     */
    public function test_read_cpas_source()
    {
        $cpasSource = cpas_source::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cpas_sources/'.$cpasSource->id
        );

        $this->assertApiResponse($cpasSource->toArray());
    }

    /**
     * @test
     */
    public function test_update_cpas_source()
    {
        $cpasSource = cpas_source::factory()->create();
        $editedcpas_source = cpas_source::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cpas_sources/'.$cpasSource->id,
            $editedcpas_source
        );

        $this->assertApiResponse($editedcpas_source);
    }

    /**
     * @test
     */
    public function test_delete_cpas_source()
    {
        $cpasSource = cpas_source::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cpas_sources/'.$cpasSource->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cpas_sources/'.$cpasSource->id
        );

        $this->response->assertStatus(404);
    }
}
