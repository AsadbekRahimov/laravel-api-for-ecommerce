<?php namespace Tests\Repositories;

use App\Models\shop_delay;
use App\Repositories\shop_delayRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_delayRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_delayRepository
     */
    protected $shopDelayRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopDelayRepo = \App::make(shop_delayRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_delay()
    {
        $shopDelay = shop_delay::factory()->make()->toArray();

        $createdshop_delay = $this->shopDelayRepo->create($shopDelay);

        $createdshop_delay = $createdshop_delay->toArray();
        $this->assertArrayHasKey('id', $createdshop_delay);
        $this->assertNotNull($createdshop_delay['id'], 'Created shop_delay must have id specified');
        $this->assertNotNull(shop_delay::find($createdshop_delay['id']), 'shop_delay with given id must be in DB');
        $this->assertModelData($shopDelay, $createdshop_delay);
    }

    /**
     * @test read
     */
    public function test_read_shop_delay()
    {
        $shopDelay = shop_delay::factory()->create();

        $dbshop_delay = $this->shopDelayRepo->find($shopDelay->id);

        $dbshop_delay = $dbshop_delay->toArray();
        $this->assertModelData($shopDelay->toArray(), $dbshop_delay);
    }

    /**
     * @test update
     */
    public function test_update_shop_delay()
    {
        $shopDelay = shop_delay::factory()->create();
        $fakeshop_delay = shop_delay::factory()->make()->toArray();

        $updatedshop_delay = $this->shopDelayRepo->update($fakeshop_delay, $shopDelay->id);

        $this->assertModelData($fakeshop_delay, $updatedshop_delay->toArray());
        $dbshop_delay = $this->shopDelayRepo->find($shopDelay->id);
        $this->assertModelData($fakeshop_delay, $dbshop_delay->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_delay()
    {
        $shopDelay = shop_delay::factory()->create();

        $resp = $this->shopDelayRepo->delete($shopDelay->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_delay::find($shopDelay->id), 'shop_delay should not exist in DB');
    }
}
