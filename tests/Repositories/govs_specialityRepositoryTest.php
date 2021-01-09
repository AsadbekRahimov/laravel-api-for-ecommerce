<?php namespace Tests\Repositories;

use App\Models\govs_speciality;
use App\Repositories\govs_specialityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class govs_specialityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var govs_specialityRepository
     */
    protected $govsSpecialityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->govsSpecialityRepo = \App::make(govs_specialityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_govs_speciality()
    {
        $govsSpeciality = govs_speciality::factory()->make()->toArray();

        $createdgovs_speciality = $this->govsSpecialityRepo->create($govsSpeciality);

        $createdgovs_speciality = $createdgovs_speciality->toArray();
        $this->assertArrayHasKey('id', $createdgovs_speciality);
        $this->assertNotNull($createdgovs_speciality['id'], 'Created govs_speciality must have id specified');
        $this->assertNotNull(govs_speciality::find($createdgovs_speciality['id']), 'govs_speciality with given id must be in DB');
        $this->assertModelData($govsSpeciality, $createdgovs_speciality);
    }

    /**
     * @test read
     */
    public function test_read_govs_speciality()
    {
        $govsSpeciality = govs_speciality::factory()->create();

        $dbgovs_speciality = $this->govsSpecialityRepo->find($govsSpeciality->id);

        $dbgovs_speciality = $dbgovs_speciality->toArray();
        $this->assertModelData($govsSpeciality->toArray(), $dbgovs_speciality);
    }

    /**
     * @test update
     */
    public function test_update_govs_speciality()
    {
        $govsSpeciality = govs_speciality::factory()->create();
        $fakegovs_speciality = govs_speciality::factory()->make()->toArray();

        $updatedgovs_speciality = $this->govsSpecialityRepo->update($fakegovs_speciality, $govsSpeciality->id);

        $this->assertModelData($fakegovs_speciality, $updatedgovs_speciality->toArray());
        $dbgovs_speciality = $this->govsSpecialityRepo->find($govsSpeciality->id);
        $this->assertModelData($fakegovs_speciality, $dbgovs_speciality->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_govs_speciality()
    {
        $govsSpeciality = govs_speciality::factory()->create();

        $resp = $this->govsSpecialityRepo->delete($govsSpeciality->id);

        $this->assertTrue($resp);
        $this->assertNull(govs_speciality::find($govsSpeciality->id), 'govs_speciality should not exist in DB');
    }
}
