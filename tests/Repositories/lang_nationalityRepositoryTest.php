<?php namespace Tests\Repositories;

use App\Models\lang_nationality;
use App\Repositories\lang_nationalityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class lang_nationalityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var lang_nationalityRepository
     */
    protected $langNationalityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->langNationalityRepo = \App::make(lang_nationalityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_lang_nationality()
    {
        $langNationality = lang_nationality::factory()->make()->toArray();

        $createdlang_nationality = $this->langNationalityRepo->create($langNationality);

        $createdlang_nationality = $createdlang_nationality->toArray();
        $this->assertArrayHasKey('id', $createdlang_nationality);
        $this->assertNotNull($createdlang_nationality['id'], 'Created lang_nationality must have id specified');
        $this->assertNotNull(lang_nationality::find($createdlang_nationality['id']), 'lang_nationality with given id must be in DB');
        $this->assertModelData($langNationality, $createdlang_nationality);
    }

    /**
     * @test read
     */
    public function test_read_lang_nationality()
    {
        $langNationality = lang_nationality::factory()->create();

        $dblang_nationality = $this->langNationalityRepo->find($langNationality->id);

        $dblang_nationality = $dblang_nationality->toArray();
        $this->assertModelData($langNationality->toArray(), $dblang_nationality);
    }

    /**
     * @test update
     */
    public function test_update_lang_nationality()
    {
        $langNationality = lang_nationality::factory()->create();
        $fakelang_nationality = lang_nationality::factory()->make()->toArray();

        $updatedlang_nationality = $this->langNationalityRepo->update($fakelang_nationality, $langNationality->id);

        $this->assertModelData($fakelang_nationality, $updatedlang_nationality->toArray());
        $dblang_nationality = $this->langNationalityRepo->find($langNationality->id);
        $this->assertModelData($fakelang_nationality, $dblang_nationality->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_lang_nationality()
    {
        $langNationality = lang_nationality::factory()->create();

        $resp = $this->langNationalityRepo->delete($langNationality->id);

        $this->assertTrue($resp);
        $this->assertNull(lang_nationality::find($langNationality->id), 'lang_nationality should not exist in DB');
    }
}
