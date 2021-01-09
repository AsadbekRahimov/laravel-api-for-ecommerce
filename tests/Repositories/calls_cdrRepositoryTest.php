<?php namespace Tests\Repositories;

use App\Models\calls_cdr;
use App\Repositories\calls_cdrRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_cdrRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_cdrRepository
     */
    protected $callsCdrRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsCdrRepo = \App::make(calls_cdrRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_cdr()
    {
        $callsCdr = calls_cdr::factory()->make()->toArray();

        $createdcalls_cdr = $this->callsCdrRepo->create($callsCdr);

        $createdcalls_cdr = $createdcalls_cdr->toArray();
        $this->assertArrayHasKey('id', $createdcalls_cdr);
        $this->assertNotNull($createdcalls_cdr['id'], 'Created calls_cdr must have id specified');
        $this->assertNotNull(calls_cdr::find($createdcalls_cdr['id']), 'calls_cdr with given id must be in DB');
        $this->assertModelData($callsCdr, $createdcalls_cdr);
    }

    /**
     * @test read
     */
    public function test_read_calls_cdr()
    {
        $callsCdr = calls_cdr::factory()->create();

        $dbcalls_cdr = $this->callsCdrRepo->find($callsCdr->id);

        $dbcalls_cdr = $dbcalls_cdr->toArray();
        $this->assertModelData($callsCdr->toArray(), $dbcalls_cdr);
    }

    /**
     * @test update
     */
    public function test_update_calls_cdr()
    {
        $callsCdr = calls_cdr::factory()->create();
        $fakecalls_cdr = calls_cdr::factory()->make()->toArray();

        $updatedcalls_cdr = $this->callsCdrRepo->update($fakecalls_cdr, $callsCdr->id);

        $this->assertModelData($fakecalls_cdr, $updatedcalls_cdr->toArray());
        $dbcalls_cdr = $this->callsCdrRepo->find($callsCdr->id);
        $this->assertModelData($fakecalls_cdr, $dbcalls_cdr->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_cdr()
    {
        $callsCdr = calls_cdr::factory()->create();

        $resp = $this->callsCdrRepo->delete($callsCdr->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_cdr::find($callsCdr->id), 'calls_cdr should not exist in DB');
    }
}
