<?php namespace Tests\Repositories;

use App\Models\drag_form_db;
use App\Repositories\drag_form_dbRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class drag_form_dbRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var drag_form_dbRepository
     */
    protected $dragFormDbRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dragFormDbRepo = \App::make(drag_form_dbRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_drag_form_db()
    {
        $dragFormDb = drag_form_db::factory()->make()->toArray();

        $createddrag_form_db = $this->dragFormDbRepo->create($dragFormDb);

        $createddrag_form_db = $createddrag_form_db->toArray();
        $this->assertArrayHasKey('id', $createddrag_form_db);
        $this->assertNotNull($createddrag_form_db['id'], 'Created drag_form_db must have id specified');
        $this->assertNotNull(drag_form_db::find($createddrag_form_db['id']), 'drag_form_db with given id must be in DB');
        $this->assertModelData($dragFormDb, $createddrag_form_db);
    }

    /**
     * @test read
     */
    public function test_read_drag_form_db()
    {
        $dragFormDb = drag_form_db::factory()->create();

        $dbdrag_form_db = $this->dragFormDbRepo->find($dragFormDb->id);

        $dbdrag_form_db = $dbdrag_form_db->toArray();
        $this->assertModelData($dragFormDb->toArray(), $dbdrag_form_db);
    }

    /**
     * @test update
     */
    public function test_update_drag_form_db()
    {
        $dragFormDb = drag_form_db::factory()->create();
        $fakedrag_form_db = drag_form_db::factory()->make()->toArray();

        $updateddrag_form_db = $this->dragFormDbRepo->update($fakedrag_form_db, $dragFormDb->id);

        $this->assertModelData($fakedrag_form_db, $updateddrag_form_db->toArray());
        $dbdrag_form_db = $this->dragFormDbRepo->find($dragFormDb->id);
        $this->assertModelData($fakedrag_form_db, $dbdrag_form_db->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_drag_form_db()
    {
        $dragFormDb = drag_form_db::factory()->create();

        $resp = $this->dragFormDbRepo->delete($dragFormDb->id);

        $this->assertTrue($resp);
        $this->assertNull(drag_form_db::find($dragFormDb->id), 'drag_form_db should not exist in DB');
    }
}
