<?php namespace Tests\Repositories;

use App\Models\calls_record;
use App\Repositories\calls_recordRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_recordRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_recordRepository
     */
    protected $callsRecordRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsRecordRepo = \App::make(calls_recordRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_record()
    {
        $callsRecord = calls_record::factory()->make()->toArray();

        $createdcalls_record = $this->callsRecordRepo->create($callsRecord);

        $createdcalls_record = $createdcalls_record->toArray();
        $this->assertArrayHasKey('id', $createdcalls_record);
        $this->assertNotNull($createdcalls_record['id'], 'Created calls_record must have id specified');
        $this->assertNotNull(calls_record::find($createdcalls_record['id']), 'calls_record with given id must be in DB');
        $this->assertModelData($callsRecord, $createdcalls_record);
    }

    /**
     * @test read
     */
    public function test_read_calls_record()
    {
        $callsRecord = calls_record::factory()->create();

        $dbcalls_record = $this->callsRecordRepo->find($callsRecord->id);

        $dbcalls_record = $dbcalls_record->toArray();
        $this->assertModelData($callsRecord->toArray(), $dbcalls_record);
    }

    /**
     * @test update
     */
    public function test_update_calls_record()
    {
        $callsRecord = calls_record::factory()->create();
        $fakecalls_record = calls_record::factory()->make()->toArray();

        $updatedcalls_record = $this->callsRecordRepo->update($fakecalls_record, $callsRecord->id);

        $this->assertModelData($fakecalls_record, $updatedcalls_record->toArray());
        $dbcalls_record = $this->callsRecordRepo->find($callsRecord->id);
        $this->assertModelData($fakecalls_record, $dbcalls_record->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_record()
    {
        $callsRecord = calls_record::factory()->create();

        $resp = $this->callsRecordRepo->delete($callsRecord->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_record::find($callsRecord->id), 'calls_record should not exist in DB');
    }
}
