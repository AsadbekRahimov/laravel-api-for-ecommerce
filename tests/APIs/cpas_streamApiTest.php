<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cpas_stream;

class cpas_streamApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cpas_stream()
    {
        $cpasStream = cpas_stream::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cpas_streams', $cpasStream
        );

        $this->assertApiResponse($cpasStream);
    }

    /**
     * @test
     */
    public function test_read_cpas_stream()
    {
        $cpasStream = cpas_stream::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cpas_streams/'.$cpasStream->id
        );

        $this->assertApiResponse($cpasStream->toArray());
    }

    /**
     * @test
     */
    public function test_update_cpas_stream()
    {
        $cpasStream = cpas_stream::factory()->create();
        $editedcpas_stream = cpas_stream::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cpas_streams/'.$cpasStream->id,
            $editedcpas_stream
        );

        $this->assertApiResponse($editedcpas_stream);
    }

    /**
     * @test
     */
    public function test_delete_cpas_stream()
    {
        $cpasStream = cpas_stream::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cpas_streams/'.$cpasStream->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cpas_streams/'.$cpasStream->id
        );

        $this->response->assertStatus(404);
    }
}
