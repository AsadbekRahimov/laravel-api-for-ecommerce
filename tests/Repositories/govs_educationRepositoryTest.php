<?php namespace Tests\Repositories;

use App\Models\govs_education;
use App\Repositories\govs_educationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class govs_educationRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var govs_educationRepository
     */
    protected $govsEducationRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->govsEducationRepo = \App::make(govs_educationRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_govs_education()
    {
        $govsEducation = govs_education::factory()->make()->toArray();

        $createdgovs_education = $this->govsEducationRepo->create($govsEducation);

        $createdgovs_education = $createdgovs_education->toArray();
        $this->assertArrayHasKey('id', $createdgovs_education);
        $this->assertNotNull($createdgovs_education['id'], 'Created govs_education must have id specified');
        $this->assertNotNull(govs_education::find($createdgovs_education['id']), 'govs_education with given id must be in DB');
        $this->assertModelData($govsEducation, $createdgovs_education);
    }

    /**
     * @test read
     */
    public function test_read_govs_education()
    {
        $govsEducation = govs_education::factory()->create();

        $dbgovs_education = $this->govsEducationRepo->find($govsEducation->id);

        $dbgovs_education = $dbgovs_education->toArray();
        $this->assertModelData($govsEducation->toArray(), $dbgovs_education);
    }

    /**
     * @test update
     */
    public function test_update_govs_education()
    {
        $govsEducation = govs_education::factory()->create();
        $fakegovs_education = govs_education::factory()->make()->toArray();

        $updatedgovs_education = $this->govsEducationRepo->update($fakegovs_education, $govsEducation->id);

        $this->assertModelData($fakegovs_education, $updatedgovs_education->toArray());
        $dbgovs_education = $this->govsEducationRepo->find($govsEducation->id);
        $this->assertModelData($fakegovs_education, $dbgovs_education->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_govs_education()
    {
        $govsEducation = govs_education::factory()->create();

        $resp = $this->govsEducationRepo->delete($govsEducation->id);

        $this->assertTrue($resp);
        $this->assertNull(govs_education::find($govsEducation->id), 'govs_education should not exist in DB');
    }
}
