<?php namespace Tests\Repositories;

use App\Models\dyna_chess_item;
use App\Repositories\dyna_chess_itemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dyna_chess_itemRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dyna_chess_itemRepository
     */
    protected $dynaChessItemRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dynaChessItemRepo = \App::make(dyna_chess_itemRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dyna_chess_item()
    {
        $dynaChessItem = dyna_chess_item::factory()->make()->toArray();

        $createddyna_chess_item = $this->dynaChessItemRepo->create($dynaChessItem);

        $createddyna_chess_item = $createddyna_chess_item->toArray();
        $this->assertArrayHasKey('id', $createddyna_chess_item);
        $this->assertNotNull($createddyna_chess_item['id'], 'Created dyna_chess_item must have id specified');
        $this->assertNotNull(dyna_chess_item::find($createddyna_chess_item['id']), 'dyna_chess_item with given id must be in DB');
        $this->assertModelData($dynaChessItem, $createddyna_chess_item);
    }

    /**
     * @test read
     */
    public function test_read_dyna_chess_item()
    {
        $dynaChessItem = dyna_chess_item::factory()->create();

        $dbdyna_chess_item = $this->dynaChessItemRepo->find($dynaChessItem->id);

        $dbdyna_chess_item = $dbdyna_chess_item->toArray();
        $this->assertModelData($dynaChessItem->toArray(), $dbdyna_chess_item);
    }

    /**
     * @test update
     */
    public function test_update_dyna_chess_item()
    {
        $dynaChessItem = dyna_chess_item::factory()->create();
        $fakedyna_chess_item = dyna_chess_item::factory()->make()->toArray();

        $updateddyna_chess_item = $this->dynaChessItemRepo->update($fakedyna_chess_item, $dynaChessItem->id);

        $this->assertModelData($fakedyna_chess_item, $updateddyna_chess_item->toArray());
        $dbdyna_chess_item = $this->dynaChessItemRepo->find($dynaChessItem->id);
        $this->assertModelData($fakedyna_chess_item, $dbdyna_chess_item->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dyna_chess_item()
    {
        $dynaChessItem = dyna_chess_item::factory()->create();

        $resp = $this->dynaChessItemRepo->delete($dynaChessItem->id);

        $this->assertTrue($resp);
        $this->assertNull(dyna_chess_item::find($dynaChessItem->id), 'dyna_chess_item should not exist in DB');
    }
}
