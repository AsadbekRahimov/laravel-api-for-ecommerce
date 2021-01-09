<?php namespace Tests\Repositories;

use App\Models\calls_extens;
use App\Repositories\calls_extensRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_extensRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_extensRepository
     */
    protected $callsExtensRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsExtensRepo = \App::make(calls_extensRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_extens()
    {
        $callsExtens = calls_extens::factory()->make()->toArray();

        $createdcalls_extens = $this->callsExtensRepo->create($callsExtens);

        $createdcalls_extens = $createdcalls_extens->toArray();
        $this->assertArrayHasKey('id', $createdcalls_extens);
        $this->assertNotNull($createdcalls_extens['id'], 'Created calls_extens must have id specified');
        $this->assertNotNull(calls_extens::find($createdcalls_extens['id']), 'calls_extens with given id must be in DB');
        $this->assertModelData($callsExtens, $createdcalls_extens);
    }

    /**
     * @test read
     */
    public function test_read_calls_extens()
    {
        $callsExtens = calls_extens::factory()->create();

        $dbcalls_extens = $this->callsExtensRepo->find($callsExtens->id);

        $dbcalls_extens = $dbcalls_extens->toArray();
        $this->assertModelData($callsExtens->toArray(), $dbcalls_extens);
    }

    /**
     * @test update
     */
    public function test_update_calls_extens()
    {
        $callsExtens = calls_extens::factory()->create();
        $fakecalls_extens = calls_extens::factory()->make()->toArray();

        $updatedcalls_extens = $this->callsExtensRepo->update($fakecalls_extens, $callsExtens->id);

        $this->assertModelData($fakecalls_extens, $updatedcalls_extens->toArray());
        $dbcalls_extens = $this->callsExtensRepo->find($callsExtens->id);
        $this->assertModelData($fakecalls_extens, $dbcalls_extens->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_extens()
    {
        $callsExtens = calls_extens::factory()->create();

        $resp = $this->callsExtensRepo->delete($callsExtens->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_extens::find($callsExtens->id), 'calls_extens should not exist in DB');
    }
}
