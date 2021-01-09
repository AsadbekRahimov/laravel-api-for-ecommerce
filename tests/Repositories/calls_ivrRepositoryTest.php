<?php namespace Tests\Repositories;

use App\Models\calls_ivr;
use App\Repositories\calls_ivrRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_ivrRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_ivrRepository
     */
    protected $callsIvrRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsIvrRepo = \App::make(calls_ivrRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_ivr()
    {
        $callsIvr = calls_ivr::factory()->make()->toArray();

        $createdcalls_ivr = $this->callsIvrRepo->create($callsIvr);

        $createdcalls_ivr = $createdcalls_ivr->toArray();
        $this->assertArrayHasKey('id', $createdcalls_ivr);
        $this->assertNotNull($createdcalls_ivr['id'], 'Created calls_ivr must have id specified');
        $this->assertNotNull(calls_ivr::find($createdcalls_ivr['id']), 'calls_ivr with given id must be in DB');
        $this->assertModelData($callsIvr, $createdcalls_ivr);
    }

    /**
     * @test read
     */
    public function test_read_calls_ivr()
    {
        $callsIvr = calls_ivr::factory()->create();

        $dbcalls_ivr = $this->callsIvrRepo->find($callsIvr->id);

        $dbcalls_ivr = $dbcalls_ivr->toArray();
        $this->assertModelData($callsIvr->toArray(), $dbcalls_ivr);
    }

    /**
     * @test update
     */
    public function test_update_calls_ivr()
    {
        $callsIvr = calls_ivr::factory()->create();
        $fakecalls_ivr = calls_ivr::factory()->make()->toArray();

        $updatedcalls_ivr = $this->callsIvrRepo->update($fakecalls_ivr, $callsIvr->id);

        $this->assertModelData($fakecalls_ivr, $updatedcalls_ivr->toArray());
        $dbcalls_ivr = $this->callsIvrRepo->find($callsIvr->id);
        $this->assertModelData($fakecalls_ivr, $dbcalls_ivr->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_ivr()
    {
        $callsIvr = calls_ivr::factory()->create();

        $resp = $this->callsIvrRepo->delete($callsIvr->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_ivr::find($callsIvr->id), 'calls_ivr should not exist in DB');
    }
}
