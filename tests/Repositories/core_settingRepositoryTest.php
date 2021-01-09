<?php namespace Tests\Repositories;

use App\Models\core_setting;
use App\Repositories\core_settingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class core_settingRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var core_settingRepository
     */
    protected $coreSettingRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coreSettingRepo = \App::make(core_settingRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_core_setting()
    {
        $coreSetting = core_setting::factory()->make()->toArray();

        $createdcore_setting = $this->coreSettingRepo->create($coreSetting);

        $createdcore_setting = $createdcore_setting->toArray();
        $this->assertArrayHasKey('id', $createdcore_setting);
        $this->assertNotNull($createdcore_setting['id'], 'Created core_setting must have id specified');
        $this->assertNotNull(core_setting::find($createdcore_setting['id']), 'core_setting with given id must be in DB');
        $this->assertModelData($coreSetting, $createdcore_setting);
    }

    /**
     * @test read
     */
    public function test_read_core_setting()
    {
        $coreSetting = core_setting::factory()->create();

        $dbcore_setting = $this->coreSettingRepo->find($coreSetting->id);

        $dbcore_setting = $dbcore_setting->toArray();
        $this->assertModelData($coreSetting->toArray(), $dbcore_setting);
    }

    /**
     * @test update
     */
    public function test_update_core_setting()
    {
        $coreSetting = core_setting::factory()->create();
        $fakecore_setting = core_setting::factory()->make()->toArray();

        $updatedcore_setting = $this->coreSettingRepo->update($fakecore_setting, $coreSetting->id);

        $this->assertModelData($fakecore_setting, $updatedcore_setting->toArray());
        $dbcore_setting = $this->coreSettingRepo->find($coreSetting->id);
        $this->assertModelData($fakecore_setting, $dbcore_setting->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_core_setting()
    {
        $coreSetting = core_setting::factory()->create();

        $resp = $this->coreSettingRepo->delete($coreSetting->id);

        $this->assertTrue($resp);
        $this->assertNull(core_setting::find($coreSetting->id), 'core_setting should not exist in DB');
    }
}
