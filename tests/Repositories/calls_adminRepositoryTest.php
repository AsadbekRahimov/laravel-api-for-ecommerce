<?php namespace Tests\Repositories;

use App\Models\calls_admin;
use App\Repositories\calls_adminRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_adminRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_adminRepository
     */
    protected $callsAdminRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsAdminRepo = \App::make(calls_adminRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_admin()
    {
        $callsAdmin = calls_admin::factory()->make()->toArray();

        $createdcalls_admin = $this->callsAdminRepo->create($callsAdmin);

        $createdcalls_admin = $createdcalls_admin->toArray();
        $this->assertArrayHasKey('id', $createdcalls_admin);
        $this->assertNotNull($createdcalls_admin['id'], 'Created calls_admin must have id specified');
        $this->assertNotNull(calls_admin::find($createdcalls_admin['id']), 'calls_admin with given id must be in DB');
        $this->assertModelData($callsAdmin, $createdcalls_admin);
    }

    /**
     * @test read
     */
    public function test_read_calls_admin()
    {
        $callsAdmin = calls_admin::factory()->create();

        $dbcalls_admin = $this->callsAdminRepo->find($callsAdmin->id);

        $dbcalls_admin = $dbcalls_admin->toArray();
        $this->assertModelData($callsAdmin->toArray(), $dbcalls_admin);
    }

    /**
     * @test update
     */
    public function test_update_calls_admin()
    {
        $callsAdmin = calls_admin::factory()->create();
        $fakecalls_admin = calls_admin::factory()->make()->toArray();

        $updatedcalls_admin = $this->callsAdminRepo->update($fakecalls_admin, $callsAdmin->id);

        $this->assertModelData($fakecalls_admin, $updatedcalls_admin->toArray());
        $dbcalls_admin = $this->callsAdminRepo->find($callsAdmin->id);
        $this->assertModelData($fakecalls_admin, $dbcalls_admin->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_admin()
    {
        $callsAdmin = calls_admin::factory()->create();

        $resp = $this->callsAdminRepo->delete($callsAdmin->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_admin::find($callsAdmin->id), 'calls_admin should not exist in DB');
    }
}
