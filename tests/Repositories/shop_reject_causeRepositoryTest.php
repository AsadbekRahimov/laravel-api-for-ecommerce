<?php namespace Tests\Repositories;

use App\Models\shop_reject_cause;
use App\Repositories\shop_reject_causeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_reject_causeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_reject_causeRepository
     */
    protected $shopRejectCauseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopRejectCauseRepo = \App::make(shop_reject_causeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_reject_cause()
    {
        $shopRejectCause = shop_reject_cause::factory()->make()->toArray();

        $createdshop_reject_cause = $this->shopRejectCauseRepo->create($shopRejectCause);

        $createdshop_reject_cause = $createdshop_reject_cause->toArray();
        $this->assertArrayHasKey('id', $createdshop_reject_cause);
        $this->assertNotNull($createdshop_reject_cause['id'], 'Created shop_reject_cause must have id specified');
        $this->assertNotNull(shop_reject_cause::find($createdshop_reject_cause['id']), 'shop_reject_cause with given id must be in DB');
        $this->assertModelData($shopRejectCause, $createdshop_reject_cause);
    }

    /**
     * @test read
     */
    public function test_read_shop_reject_cause()
    {
        $shopRejectCause = shop_reject_cause::factory()->create();

        $dbshop_reject_cause = $this->shopRejectCauseRepo->find($shopRejectCause->id);

        $dbshop_reject_cause = $dbshop_reject_cause->toArray();
        $this->assertModelData($shopRejectCause->toArray(), $dbshop_reject_cause);
    }

    /**
     * @test update
     */
    public function test_update_shop_reject_cause()
    {
        $shopRejectCause = shop_reject_cause::factory()->create();
        $fakeshop_reject_cause = shop_reject_cause::factory()->make()->toArray();

        $updatedshop_reject_cause = $this->shopRejectCauseRepo->update($fakeshop_reject_cause, $shopRejectCause->id);

        $this->assertModelData($fakeshop_reject_cause, $updatedshop_reject_cause->toArray());
        $dbshop_reject_cause = $this->shopRejectCauseRepo->find($shopRejectCause->id);
        $this->assertModelData($fakeshop_reject_cause, $dbshop_reject_cause->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_reject_cause()
    {
        $shopRejectCause = shop_reject_cause::factory()->create();

        $resp = $this->shopRejectCauseRepo->delete($shopRejectCause->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_reject_cause::find($shopRejectCause->id), 'shop_reject_cause should not exist in DB');
    }
}
