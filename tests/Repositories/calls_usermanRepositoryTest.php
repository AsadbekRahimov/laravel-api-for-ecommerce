<?php namespace Tests\Repositories;

use App\Models\calls_userman;
use App\Repositories\calls_usermanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_usermanRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_usermanRepository
     */
    protected $callsUsermanRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsUsermanRepo = \App::make(calls_usermanRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_userman()
    {
        $callsUserman = calls_userman::factory()->make()->toArray();

        $createdcalls_userman = $this->callsUsermanRepo->create($callsUserman);

        $createdcalls_userman = $createdcalls_userman->toArray();
        $this->assertArrayHasKey('id', $createdcalls_userman);
        $this->assertNotNull($createdcalls_userman['id'], 'Created calls_userman must have id specified');
        $this->assertNotNull(calls_userman::find($createdcalls_userman['id']), 'calls_userman with given id must be in DB');
        $this->assertModelData($callsUserman, $createdcalls_userman);
    }

    /**
     * @test read
     */
    public function test_read_calls_userman()
    {
        $callsUserman = calls_userman::factory()->create();

        $dbcalls_userman = $this->callsUsermanRepo->find($callsUserman->id);

        $dbcalls_userman = $dbcalls_userman->toArray();
        $this->assertModelData($callsUserman->toArray(), $dbcalls_userman);
    }

    /**
     * @test update
     */
    public function test_update_calls_userman()
    {
        $callsUserman = calls_userman::factory()->create();
        $fakecalls_userman = calls_userman::factory()->make()->toArray();

        $updatedcalls_userman = $this->callsUsermanRepo->update($fakecalls_userman, $callsUserman->id);

        $this->assertModelData($fakecalls_userman, $updatedcalls_userman->toArray());
        $dbcalls_userman = $this->callsUsermanRepo->find($callsUserman->id);
        $this->assertModelData($fakecalls_userman, $dbcalls_userman->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_userman()
    {
        $callsUserman = calls_userman::factory()->create();

        $resp = $this->callsUsermanRepo->delete($callsUserman->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_userman::find($callsUserman->id), 'calls_userman should not exist in DB');
    }
}
