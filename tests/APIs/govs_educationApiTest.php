<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\govs_education;

class govs_educationApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_govs_education()
    {
        $govsEducation = govs_education::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/govs_educations', $govsEducation
        );

        $this->assertApiResponse($govsEducation);
    }

    /**
     * @test
     */
    public function test_read_govs_education()
    {
        $govsEducation = govs_education::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/govs_educations/'.$govsEducation->id
        );

        $this->assertApiResponse($govsEducation->toArray());
    }

    /**
     * @test
     */
    public function test_update_govs_education()
    {
        $govsEducation = govs_education::factory()->create();
        $editedgovs_education = govs_education::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/govs_educations/'.$govsEducation->id,
            $editedgovs_education
        );

        $this->assertApiResponse($editedgovs_education);
    }

    /**
     * @test
     */
    public function test_delete_govs_education()
    {
        $govsEducation = govs_education::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/govs_educations/'.$govsEducation->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/govs_educations/'.$govsEducation->id
        );

        $this->response->assertStatus(404);
    }
}
