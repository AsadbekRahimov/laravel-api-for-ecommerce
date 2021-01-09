<?php namespace Tests\Repositories;

use App\Models\doft_shippers;
use App\Repositories\doft_shippersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class doft_shippersRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var doft_shippersRepository
     */
    protected $doftShippersRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->doftShippersRepo = \App::make(doft_shippersRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_doft_shippers()
    {
        $doftShippers = doft_shippers::factory()->make()->toArray();

        $createddoft_shippers = $this->doftShippersRepo->create($doftShippers);

        $createddoft_shippers = $createddoft_shippers->toArray();
        $this->assertArrayHasKey('id', $createddoft_shippers);
        $this->assertNotNull($createddoft_shippers['id'], 'Created doft_shippers must have id specified');
        $this->assertNotNull(doft_shippers::find($createddoft_shippers['id']), 'doft_shippers with given id must be in DB');
        $this->assertModelData($doftShippers, $createddoft_shippers);
    }

    /**
     * @test read
     */
    public function test_read_doft_shippers()
    {
        $doftShippers = doft_shippers::factory()->create();

        $dbdoft_shippers = $this->doftShippersRepo->find($doftShippers->id);

        $dbdoft_shippers = $dbdoft_shippers->toArray();
        $this->assertModelData($doftShippers->toArray(), $dbdoft_shippers);
    }

    /**
     * @test update
     */
    public function test_update_doft_shippers()
    {
        $doftShippers = doft_shippers::factory()->create();
        $fakedoft_shippers = doft_shippers::factory()->make()->toArray();

        $updateddoft_shippers = $this->doftShippersRepo->update($fakedoft_shippers, $doftShippers->id);

        $this->assertModelData($fakedoft_shippers, $updateddoft_shippers->toArray());
        $dbdoft_shippers = $this->doftShippersRepo->find($doftShippers->id);
        $this->assertModelData($fakedoft_shippers, $dbdoft_shippers->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_doft_shippers()
    {
        $doftShippers = doft_shippers::factory()->create();

        $resp = $this->doftShippersRepo->delete($doftShippers->id);

        $this->assertTrue($resp);
        $this->assertNull(doft_shippers::find($doftShippers->id), 'doft_shippers should not exist in DB');
    }
}
