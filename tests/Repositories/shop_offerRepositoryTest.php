<?php namespace Tests\Repositories;

use App\Models\shop_offer;
use App\Repositories\shop_offerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_offerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_offerRepository
     */
    protected $shopOfferRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopOfferRepo = \App::make(shop_offerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_offer()
    {
        $shopOffer = shop_offer::factory()->make()->toArray();

        $createdshop_offer = $this->shopOfferRepo->create($shopOffer);

        $createdshop_offer = $createdshop_offer->toArray();
        $this->assertArrayHasKey('id', $createdshop_offer);
        $this->assertNotNull($createdshop_offer['id'], 'Created shop_offer must have id specified');
        $this->assertNotNull(shop_offer::find($createdshop_offer['id']), 'shop_offer with given id must be in DB');
        $this->assertModelData($shopOffer, $createdshop_offer);
    }

    /**
     * @test read
     */
    public function test_read_shop_offer()
    {
        $shopOffer = shop_offer::factory()->create();

        $dbshop_offer = $this->shopOfferRepo->find($shopOffer->id);

        $dbshop_offer = $dbshop_offer->toArray();
        $this->assertModelData($shopOffer->toArray(), $dbshop_offer);
    }

    /**
     * @test update
     */
    public function test_update_shop_offer()
    {
        $shopOffer = shop_offer::factory()->create();
        $fakeshop_offer = shop_offer::factory()->make()->toArray();

        $updatedshop_offer = $this->shopOfferRepo->update($fakeshop_offer, $shopOffer->id);

        $this->assertModelData($fakeshop_offer, $updatedshop_offer->toArray());
        $dbshop_offer = $this->shopOfferRepo->find($shopOffer->id);
        $this->assertModelData($fakeshop_offer, $dbshop_offer->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_offer()
    {
        $shopOffer = shop_offer::factory()->create();

        $resp = $this->shopOfferRepo->delete($shopOffer->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_offer::find($shopOffer->id), 'shop_offer should not exist in DB');
    }
}
