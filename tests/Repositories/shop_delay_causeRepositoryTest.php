<?php namespace Tests\Repositories;

use App\Models\shop_delay_cause;
use App\Repositories\shop_delay_causeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_delay_causeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_delay_causeRepository
     */
    protected $shopDelayCauseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopDelayCauseRepo = \App::make(shop_delay_causeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_delay_cause()
    {
        $shopDelayCause = shop_delay_cause::factory()->make()->toArray();

        $createdshop_delay_cause = $this->shopDelayCauseRepo->create($shopDelayCause);

        $createdshop_delay_cause = $createdshop_delay_cause->toArray();
        $this->assertArrayHasKey('id', $createdshop_delay_cause);
        $this->assertNotNull($createdshop_delay_cause['id'], 'Created shop_delay_cause must have id specified');
        $this->assertNotNull(shop_delay_cause::find($createdshop_delay_cause['id']), 'shop_delay_cause with given id must be in DB');
        $this->assertModelData($shopDelayCause, $createdshop_delay_cause);
    }

    /**
     * @test read
     */
    public function test_read_shop_delay_cause()
    {
        $shopDelayCause = shop_delay_cause::factory()->create();

        $dbshop_delay_cause = $this->shopDelayCauseRepo->find($shopDelayCause->id);

        $dbshop_delay_cause = $dbshop_delay_cause->toArray();
        $this->assertModelData($shopDelayCause->toArray(), $dbshop_delay_cause);
    }

    /**
     * @test update
     */
    public function test_update_shop_delay_cause()
    {
        $shopDelayCause = shop_delay_cause::factory()->create();
        $fakeshop_delay_cause = shop_delay_cause::factory()->make()->toArray();

        $updatedshop_delay_cause = $this->shopDelayCauseRepo->update($fakeshop_delay_cause, $shopDelayCause->id);

        $this->assertModelData($fakeshop_delay_cause, $updatedshop_delay_cause->toArray());
        $dbshop_delay_cause = $this->shopDelayCauseRepo->find($shopDelayCause->id);
        $this->assertModelData($fakeshop_delay_cause, $dbshop_delay_cause->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_delay_cause()
    {
        $shopDelayCause = shop_delay_cause::factory()->create();

        $resp = $this->shopDelayCauseRepo->delete($shopDelayCause->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_delay_cause::find($shopDelayCause->id), 'shop_delay_cause should not exist in DB');
    }
}
