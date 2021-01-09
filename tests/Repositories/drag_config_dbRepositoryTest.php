<?php namespace Tests\Repositories;

use App\Models\drag_config_db;
use App\Repositories\drag_config_dbRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class drag_config_dbRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var drag_config_dbRepository
     */
    protected $dragConfigDbRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dragConfigDbRepo = \App::make(drag_config_dbRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_drag_config_db()
    {
        $dragConfigDb = drag_config_db::factory()->make()->toArray();

        $createddrag_config_db = $this->dragConfigDbRepo->create($dragConfigDb);

        $createddrag_config_db = $createddrag_config_db->toArray();
        $this->assertArrayHasKey('id', $createddrag_config_db);
        $this->assertNotNull($createddrag_config_db['id'], 'Created drag_config_db must have id specified');
        $this->assertNotNull(drag_config_db::find($createddrag_config_db['id']), 'drag_config_db with given id must be in DB');
        $this->assertModelData($dragConfigDb, $createddrag_config_db);
    }

    /**
     * @test read
     */
    public function test_read_drag_config_db()
    {
        $dragConfigDb = drag_config_db::factory()->create();

        $dbdrag_config_db = $this->dragConfigDbRepo->find($dragConfigDb->id);

        $dbdrag_config_db = $dbdrag_config_db->toArray();
        $this->assertModelData($dragConfigDb->toArray(), $dbdrag_config_db);
    }

    /**
     * @test update
     */
    public function test_update_drag_config_db()
    {
        $dragConfigDb = drag_config_db::factory()->create();
        $fakedrag_config_db = drag_config_db::factory()->make()->toArray();

        $updateddrag_config_db = $this->dragConfigDbRepo->update($fakedrag_config_db, $dragConfigDb->id);

        $this->assertModelData($fakedrag_config_db, $updateddrag_config_db->toArray());
        $dbdrag_config_db = $this->dragConfigDbRepo->find($dragConfigDb->id);
        $this->assertModelData($fakedrag_config_db, $dbdrag_config_db->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_drag_config_db()
    {
        $dragConfigDb = drag_config_db::factory()->create();

        $resp = $this->dragConfigDbRepo->delete($dragConfigDb->id);

        $this->assertTrue($resp);
        $this->assertNull(drag_config_db::find($dragConfigDb->id), 'drag_config_db should not exist in DB');
    }
}
