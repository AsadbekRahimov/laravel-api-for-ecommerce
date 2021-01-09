<?php namespace Tests\Repositories;

use App\Models\drag_config;
use App\Repositories\drag_configRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class drag_configRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var drag_configRepository
     */
    protected $dragConfigRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dragConfigRepo = \App::make(drag_configRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_drag_config()
    {
        $dragConfig = drag_config::factory()->make()->toArray();

        $createddrag_config = $this->dragConfigRepo->create($dragConfig);

        $createddrag_config = $createddrag_config->toArray();
        $this->assertArrayHasKey('id', $createddrag_config);
        $this->assertNotNull($createddrag_config['id'], 'Created drag_config must have id specified');
        $this->assertNotNull(drag_config::find($createddrag_config['id']), 'drag_config with given id must be in DB');
        $this->assertModelData($dragConfig, $createddrag_config);
    }

    /**
     * @test read
     */
    public function test_read_drag_config()
    {
        $dragConfig = drag_config::factory()->create();

        $dbdrag_config = $this->dragConfigRepo->find($dragConfig->id);

        $dbdrag_config = $dbdrag_config->toArray();
        $this->assertModelData($dragConfig->toArray(), $dbdrag_config);
    }

    /**
     * @test update
     */
    public function test_update_drag_config()
    {
        $dragConfig = drag_config::factory()->create();
        $fakedrag_config = drag_config::factory()->make()->toArray();

        $updateddrag_config = $this->dragConfigRepo->update($fakedrag_config, $dragConfig->id);

        $this->assertModelData($fakedrag_config, $updateddrag_config->toArray());
        $dbdrag_config = $this->dragConfigRepo->find($dragConfig->id);
        $this->assertModelData($fakedrag_config, $dbdrag_config->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_drag_config()
    {
        $dragConfig = drag_config::factory()->create();

        $resp = $this->dragConfigRepo->delete($dragConfig->id);

        $this->assertTrue($resp);
        $this->assertNull(drag_config::find($dragConfig->id), 'drag_config should not exist in DB');
    }
}
