<?php namespace Tests\Repositories;

use App\Models\cpas_offer;
use App\Repositories\cpas_offerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class cpas_offerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var cpas_offerRepository
     */
    protected $cpasOfferRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cpasOfferRepo = \App::make(cpas_offerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cpas_offer()
    {
        $cpasOffer = cpas_offer::factory()->make()->toArray();

        $createdcpas_offer = $this->cpasOfferRepo->create($cpasOffer);

        $createdcpas_offer = $createdcpas_offer->toArray();
        $this->assertArrayHasKey('id', $createdcpas_offer);
        $this->assertNotNull($createdcpas_offer['id'], 'Created cpas_offer must have id specified');
        $this->assertNotNull(cpas_offer::find($createdcpas_offer['id']), 'cpas_offer with given id must be in DB');
        $this->assertModelData($cpasOffer, $createdcpas_offer);
    }

    /**
     * @test read
     */
    public function test_read_cpas_offer()
    {
        $cpasOffer = cpas_offer::factory()->create();

        $dbcpas_offer = $this->cpasOfferRepo->find($cpasOffer->id);

        $dbcpas_offer = $dbcpas_offer->toArray();
        $this->assertModelData($cpasOffer->toArray(), $dbcpas_offer);
    }

    /**
     * @test update
     */
    public function test_update_cpas_offer()
    {
        $cpasOffer = cpas_offer::factory()->create();
        $fakecpas_offer = cpas_offer::factory()->make()->toArray();

        $updatedcpas_offer = $this->cpasOfferRepo->update($fakecpas_offer, $cpasOffer->id);

        $this->assertModelData($fakecpas_offer, $updatedcpas_offer->toArray());
        $dbcpas_offer = $this->cpasOfferRepo->find($cpasOffer->id);
        $this->assertModelData($fakecpas_offer, $dbcpas_offer->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cpas_offer()
    {
        $cpasOffer = cpas_offer::factory()->create();

        $resp = $this->cpasOfferRepo->delete($cpasOffer->id);

        $this->assertTrue($resp);
        $this->assertNull(cpas_offer::find($cpasOffer->id), 'cpas_offer should not exist in DB');
    }
}
