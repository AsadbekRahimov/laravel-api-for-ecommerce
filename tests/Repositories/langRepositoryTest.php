<?php namespace Tests\Repositories;

use App\Models\lang;
use App\Repositories\langRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class langRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var langRepository
     */
    protected $langRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->langRepo = \App::make(langRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_lang()
    {
        $lang = lang::factory()->make()->toArray();

        $createdlang = $this->langRepo->create($lang);

        $createdlang = $createdlang->toArray();
        $this->assertArrayHasKey('id', $createdlang);
        $this->assertNotNull($createdlang['id'], 'Created lang must have id specified');
        $this->assertNotNull(lang::find($createdlang['id']), 'lang with given id must be in DB');
        $this->assertModelData($lang, $createdlang);
    }

    /**
     * @test read
     */
    public function test_read_lang()
    {
        $lang = lang::factory()->create();

        $dblang = $this->langRepo->find($lang->id);

        $dblang = $dblang->toArray();
        $this->assertModelData($lang->toArray(), $dblang);
    }

    /**
     * @test update
     */
    public function test_update_lang()
    {
        $lang = lang::factory()->create();
        $fakelang = lang::factory()->make()->toArray();

        $updatedlang = $this->langRepo->update($fakelang, $lang->id);

        $this->assertModelData($fakelang, $updatedlang->toArray());
        $dblang = $this->langRepo->find($lang->id);
        $this->assertModelData($fakelang, $dblang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_lang()
    {
        $lang = lang::factory()->create();

        $resp = $this->langRepo->delete($lang->id);

        $this->assertTrue($resp);
        $this->assertNull(lang::find($lang->id), 'lang should not exist in DB');
    }
}
