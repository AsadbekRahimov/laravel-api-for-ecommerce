<?php namespace Tests\Repositories;

use App\Models\shop_channel;
use App\Repositories\shop_channelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_channelRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_channelRepository
     */
    protected $shopChannelRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopChannelRepo = \App::make(shop_channelRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_channel()
    {
        $shopChannel = shop_channel::factory()->make()->toArray();

        $createdshop_channel = $this->shopChannelRepo->create($shopChannel);

        $createdshop_channel = $createdshop_channel->toArray();
        $this->assertArrayHasKey('id', $createdshop_channel);
        $this->assertNotNull($createdshop_channel['id'], 'Created shop_channel must have id specified');
        $this->assertNotNull(shop_channel::find($createdshop_channel['id']), 'shop_channel with given id must be in DB');
        $this->assertModelData($shopChannel, $createdshop_channel);
    }

    /**
     * @test read
     */
    public function test_read_shop_channel()
    {
        $shopChannel = shop_channel::factory()->create();

        $dbshop_channel = $this->shopChannelRepo->find($shopChannel->id);

        $dbshop_channel = $dbshop_channel->toArray();
        $this->assertModelData($shopChannel->toArray(), $dbshop_channel);
    }

    /**
     * @test update
     */
    public function test_update_shop_channel()
    {
        $shopChannel = shop_channel::factory()->create();
        $fakeshop_channel = shop_channel::factory()->make()->toArray();

        $updatedshop_channel = $this->shopChannelRepo->update($fakeshop_channel, $shopChannel->id);

        $this->assertModelData($fakeshop_channel, $updatedshop_channel->toArray());
        $dbshop_channel = $this->shopChannelRepo->find($shopChannel->id);
        $this->assertModelData($fakeshop_channel, $dbshop_channel->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_channel()
    {
        $shopChannel = shop_channel::factory()->create();

        $resp = $this->shopChannelRepo->delete($shopChannel->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_channel::find($shopChannel->id), 'shop_channel should not exist in DB');
    }
}
