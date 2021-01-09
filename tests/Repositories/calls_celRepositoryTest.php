<?php namespace Tests\Repositories;

use App\Models\calls_cel;
use App\Repositories\calls_celRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_celRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_celRepository
     */
    protected $callsCelRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsCelRepo = \App::make(calls_celRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_cel()
    {
        $callsCel = calls_cel::factory()->make()->toArray();

        $createdcalls_cel = $this->callsCelRepo->create($callsCel);

        $createdcalls_cel = $createdcalls_cel->toArray();
        $this->assertArrayHasKey('id', $createdcalls_cel);
        $this->assertNotNull($createdcalls_cel['id'], 'Created calls_cel must have id specified');
        $this->assertNotNull(calls_cel::find($createdcalls_cel['id']), 'calls_cel with given id must be in DB');
        $this->assertModelData($callsCel, $createdcalls_cel);
    }

    /**
     * @test read
     */
    public function test_read_calls_cel()
    {
        $callsCel = calls_cel::factory()->create();

        $dbcalls_cel = $this->callsCelRepo->find($callsCel->id);

        $dbcalls_cel = $dbcalls_cel->toArray();
        $this->assertModelData($callsCel->toArray(), $dbcalls_cel);
    }

    /**
     * @test update
     */
    public function test_update_calls_cel()
    {
        $callsCel = calls_cel::factory()->create();
        $fakecalls_cel = calls_cel::factory()->make()->toArray();

        $updatedcalls_cel = $this->callsCelRepo->update($fakecalls_cel, $callsCel->id);

        $this->assertModelData($fakecalls_cel, $updatedcalls_cel->toArray());
        $dbcalls_cel = $this->callsCelRepo->find($callsCel->id);
        $this->assertModelData($fakecalls_cel, $dbcalls_cel->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_cel()
    {
        $callsCel = calls_cel::factory()->create();

        $resp = $this->callsCelRepo->delete($callsCel->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_cel::find($callsCel->id), 'calls_cel should not exist in DB');
    }
}
