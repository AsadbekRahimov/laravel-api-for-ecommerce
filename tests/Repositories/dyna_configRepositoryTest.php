<?php namespace Tests\Repositories;

use App\Models\dyna_config;
use App\Repositories\dyna_configRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dyna_configRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dyna_configRepository
     */
    protected $dynaConfigRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dynaConfigRepo = \App::make(dyna_configRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dyna_config()
    {
        $dynaConfig = dyna_config::factory()->make()->toArray();

        $createddyna_config = $this->dynaConfigRepo->create($dynaConfig);

        $createddyna_config = $createddyna_config->toArray();
        $this->assertArrayHasKey('id', $createddyna_config);
        $this->assertNotNull($createddyna_config['id'], 'Created dyna_config must have id specified');
        $this->assertNotNull(dyna_config::find($createddyna_config['id']), 'dyna_config with given id must be in DB');
        $this->assertModelData($dynaConfig, $createddyna_config);
    }

    /**
     * @test read
     */
    public function test_read_dyna_config()
    {
        $dynaConfig = dyna_config::factory()->create();

        $dbdyna_config = $this->dynaConfigRepo->find($dynaConfig->id);

        $dbdyna_config = $dbdyna_config->toArray();
        $this->assertModelData($dynaConfig->toArray(), $dbdyna_config);
    }

    /**
     * @test update
     */
    public function test_update_dyna_config()
    {
        $dynaConfig = dyna_config::factory()->create();
        $fakedyna_config = dyna_config::factory()->make()->toArray();

        $updateddyna_config = $this->dynaConfigRepo->update($fakedyna_config, $dynaConfig->id);

        $this->assertModelData($fakedyna_config, $updateddyna_config->toArray());
        $dbdyna_config = $this->dynaConfigRepo->find($dynaConfig->id);
        $this->assertModelData($fakedyna_config, $dbdyna_config->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dyna_config()
    {
        $dynaConfig = dyna_config::factory()->create();

        $resp = $this->dynaConfigRepo->delete($dynaConfig->id);

        $this->assertTrue($resp);
        $this->assertNull(dyna_config::find($dynaConfig->id), 'dyna_config should not exist in DB');
    }
}
