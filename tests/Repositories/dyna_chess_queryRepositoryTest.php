<?php namespace Tests\Repositories;

use App\Models\dyna_chess_query;
use App\Repositories\dyna_chess_queryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dyna_chess_queryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dyna_chess_queryRepository
     */
    protected $dynaChessQueryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dynaChessQueryRepo = \App::make(dyna_chess_queryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dyna_chess_query()
    {
        $dynaChessQuery = dyna_chess_query::factory()->make()->toArray();

        $createddyna_chess_query = $this->dynaChessQueryRepo->create($dynaChessQuery);

        $createddyna_chess_query = $createddyna_chess_query->toArray();
        $this->assertArrayHasKey('id', $createddyna_chess_query);
        $this->assertNotNull($createddyna_chess_query['id'], 'Created dyna_chess_query must have id specified');
        $this->assertNotNull(dyna_chess_query::find($createddyna_chess_query['id']), 'dyna_chess_query with given id must be in DB');
        $this->assertModelData($dynaChessQuery, $createddyna_chess_query);
    }

    /**
     * @test read
     */
    public function test_read_dyna_chess_query()
    {
        $dynaChessQuery = dyna_chess_query::factory()->create();

        $dbdyna_chess_query = $this->dynaChessQueryRepo->find($dynaChessQuery->id);

        $dbdyna_chess_query = $dbdyna_chess_query->toArray();
        $this->assertModelData($dynaChessQuery->toArray(), $dbdyna_chess_query);
    }

    /**
     * @test update
     */
    public function test_update_dyna_chess_query()
    {
        $dynaChessQuery = dyna_chess_query::factory()->create();
        $fakedyna_chess_query = dyna_chess_query::factory()->make()->toArray();

        $updateddyna_chess_query = $this->dynaChessQueryRepo->update($fakedyna_chess_query, $dynaChessQuery->id);

        $this->assertModelData($fakedyna_chess_query, $updateddyna_chess_query->toArray());
        $dbdyna_chess_query = $this->dynaChessQueryRepo->find($dynaChessQuery->id);
        $this->assertModelData($fakedyna_chess_query, $dbdyna_chess_query->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dyna_chess_query()
    {
        $dynaChessQuery = dyna_chess_query::factory()->create();

        $resp = $this->dynaChessQueryRepo->delete($dynaChessQuery->id);

        $this->assertTrue($resp);
        $this->assertNull(dyna_chess_query::find($dynaChessQuery->id), 'dyna_chess_query should not exist in DB');
    }
}
