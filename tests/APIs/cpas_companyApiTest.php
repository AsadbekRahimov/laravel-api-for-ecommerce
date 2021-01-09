<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\cpas_company;

class cpas_companyApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cpas_company()
    {
        $cpasCompany = cpas_company::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cpas_companies', $cpasCompany
        );

        $this->assertApiResponse($cpasCompany);
    }

    /**
     * @test
     */
    public function test_read_cpas_company()
    {
        $cpasCompany = cpas_company::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/cpas_companies/'.$cpasCompany->id
        );

        $this->assertApiResponse($cpasCompany->toArray());
    }

    /**
     * @test
     */
    public function test_update_cpas_company()
    {
        $cpasCompany = cpas_company::factory()->create();
        $editedcpas_company = cpas_company::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cpas_companies/'.$cpasCompany->id,
            $editedcpas_company
        );

        $this->assertApiResponse($editedcpas_company);
    }

    /**
     * @test
     */
    public function test_delete_cpas_company()
    {
        $cpasCompany = cpas_company::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cpas_companies/'.$cpasCompany->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cpas_companies/'.$cpasCompany->id
        );

        $this->response->assertStatus(404);
    }
}
