<?php namespace Tests\Repositories;

use App\Models\dyna_chess;
use App\Repositories\dyna_chessRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dyna_chessRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dyna_chessRepository
     */
    protected $dynaChessRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dynaChessRepo = \App::make(dyna_chessRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dyna_chess()
    {
        $dynaChess = dyna_chess::factory()->make()->toArray();

        $createddyna_chess = $this->dynaChessRepo->create($dynaChess);

        $createddyna_chess = $createddyna_chess->toArray();
        $this->assertArrayHasKey('id', $createddyna_chess);
        $this->assertNotNull($createddyna_chess['id'], 'Created dyna_chess must have id specified');
        $this->assertNotNull(dyna_chess::find($createddyna_chess['id']), 'dyna_chess with given id must be in DB');
        $this->assertModelData($dynaChess, $createddyna_chess);
    }

    /**
     * @test read
     */
    public function test_read_dyna_chess()
    {
        $dynaChess = dyna_chess::factory()->create();

        $dbdyna_chess = $this->dynaChessRepo->find($dynaChess->id);

        $dbdyna_chess = $dbdyna_chess->toArray();
        $this->assertModelData($dynaChess->toArray(), $dbdyna_chess);
    }

    /**
     * @test update
     */
    public function test_update_dyna_chess()
    {
        $dynaChess = dyna_chess::factory()->create();
        $fakedyna_chess = dyna_chess::factory()->make()->toArray();

        $updateddyna_chess = $this->dynaChessRepo->update($fakedyna_chess, $dynaChess->id);

        $this->assertModelData($fakedyna_chess, $updateddyna_chess->toArray());
        $dbdyna_chess = $this->dynaChessRepo->find($dynaChess->id);
        $this->assertModelData($fakedyna_chess, $dbdyna_chess->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dyna_chess()
    {
        $dynaChess = dyna_chess::factory()->create();

        $resp = $this->dynaChessRepo->delete($dynaChess->id);

        $this->assertTrue($resp);
        $this->assertNull(dyna_chess::find($dynaChess->id), 'dyna_chess should not exist in DB');
    }
}
