<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\govs_speciality;

class govs_specialityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_govs_speciality()
    {
        $govsSpeciality = govs_speciality::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/govs_specialities', $govsSpeciality
        );

        $this->assertApiResponse($govsSpeciality);
    }

    /**
     * @test
     */
    public function test_read_govs_speciality()
    {
        $govsSpeciality = govs_speciality::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/govs_specialities/'.$govsSpeciality->id
        );

        $this->assertApiResponse($govsSpeciality->toArray());
    }

    /**
     * @test
     */
    public function test_update_govs_speciality()
    {
        $govsSpeciality = govs_speciality::factory()->create();
        $editedgovs_speciality = govs_speciality::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/govs_specialities/'.$govsSpeciality->id,
            $editedgovs_speciality
        );

        $this->assertApiResponse($editedgovs_speciality);
    }

    /**
     * @test
     */
    public function test_delete_govs_speciality()
    {
        $govsSpeciality = govs_speciality::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/govs_specialities/'.$govsSpeciality->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/govs_specialities/'.$govsSpeciality->id
        );

        $this->response->assertStatus(404);
    }
}
