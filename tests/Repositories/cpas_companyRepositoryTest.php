<?php namespace Tests\Repositories;

use App\Models\cpas_company;
use App\Repositories\cpas_companyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cpas_companyRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cpas_companyRepository
     */
    protected $cpasCompanyRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cpasCompanyRepo = \App::make(cpas_companyRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cpas_company()
    {
        $cpasCompany = cpas_company::factory()->make()->toArray();

        $createdcpas_company = $this->cpasCompanyRepo->create($cpasCompany);

        $createdcpas_company = $createdcpas_company->toArray();
        $this->assertArrayHasKey('id', $createdcpas_company);
        $this->assertNotNull($createdcpas_company['id'], 'Created cpas_company must have id specified');
        $this->assertNotNull(cpas_company::find($createdcpas_company['id']), 'cpas_company with given id must be in DB');
        $this->assertModelData($cpasCompany, $createdcpas_company);
    }

    /**
     * @test read
     */
    public function test_read_cpas_company()
    {
        $cpasCompany = cpas_company::factory()->create();

        $dbcpas_company = $this->cpasCompanyRepo->find($cpasCompany->id);

        $dbcpas_company = $dbcpas_company->toArray();
        $this->assertModelData($cpasCompany->toArray(), $dbcpas_company);
    }

    /**
     * @test update
     */
    public function test_update_cpas_company()
    {
        $cpasCompany = cpas_company::factory()->create();
        $fakecpas_company = cpas_company::factory()->make()->toArray();

        $updatedcpas_company = $this->cpasCompanyRepo->update($fakecpas_company, $cpasCompany->id);

        $this->assertModelData($fakecpas_company, $updatedcpas_company->toArray());
        $dbcpas_company = $this->cpasCompanyRepo->find($cpasCompany->id);
        $this->assertModelData($fakecpas_company, $dbcpas_company->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cpas_company()
    {
        $cpasCompany = cpas_company::factory()->create();

        $resp = $this->cpasCompanyRepo->delete($cpasCompany->id);

        $this->assertTrue($resp);
        $this->assertNull(cpas_company::find($cpasCompany->id), 'cpas_company should not exist in DB');
    }
}
