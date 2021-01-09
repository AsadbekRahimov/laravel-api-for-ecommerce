<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\govs_degree;

class govs_degreeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_govs_degree()
    {
        $govsDegree = govs_degree::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/govs_degrees', $govsDegree
        );

        $this->assertApiResponse($govsDegree);
    }

    /**
     * @test
     */
    public function test_read_govs_degree()
    {
        $govsDegree = govs_degree::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/govs_degrees/'.$govsDegree->id
        );

        $this->assertApiResponse($govsDegree->toArray());
    }

    /**
     * @test
     */
    public function test_update_govs_degree()
    {
        $govsDegree = govs_degree::factory()->create();
        $editedgovs_degree = govs_degree::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/govs_degrees/'.$govsDegree->id,
            $editedgovs_degree
        );

        $this->assertApiResponse($editedgovs_degree);
    }

    /**
     * @test
     */
    public function test_delete_govs_degree()
    {
        $govsDegree = govs_degree::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/govs_degrees/'.$govsDegree->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/govs_degrees/'.$govsDegree->id
        );

        $this->response->assertStatus(404);
    }
}
