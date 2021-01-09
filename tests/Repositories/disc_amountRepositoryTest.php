<?php namespace Tests\Repositories;

use App\Models\disc_amount;
use App\Repositories\disc_amountRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class disc_amountRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var disc_amountRepository
     */
    protected $discAmountRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->discAmountRepo = \App::make(disc_amountRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_disc_amount()
    {
        $discAmount = disc_amount::factory()->make()->toArray();

        $createddisc_amount = $this->discAmountRepo->create($discAmount);

        $createddisc_amount = $createddisc_amount->toArray();
        $this->assertArrayHasKey('id', $createddisc_amount);
        $this->assertNotNull($createddisc_amount['id'], 'Created disc_amount must have id specified');
        $this->assertNotNull(disc_amount::find($createddisc_amount['id']), 'disc_amount with given id must be in DB');
        $this->assertModelData($discAmount, $createddisc_amount);
    }

    /**
     * @test read
     */
    public function test_read_disc_amount()
    {
        $discAmount = disc_amount::factory()->create();

        $dbdisc_amount = $this->discAmountRepo->find($discAmount->id);

        $dbdisc_amount = $dbdisc_amount->toArray();
        $this->assertModelData($discAmount->toArray(), $dbdisc_amount);
    }

    /**
     * @test update
     */
    public function test_update_disc_amount()
    {
        $discAmount = disc_amount::factory()->create();
        $fakedisc_amount = disc_amount::factory()->make()->toArray();

        $updateddisc_amount = $this->discAmountRepo->update($fakedisc_amount, $discAmount->id);

        $this->assertModelData($fakedisc_amount, $updateddisc_amount->toArray());
        $dbdisc_amount = $this->discAmountRepo->find($discAmount->id);
        $this->assertModelData($fakedisc_amount, $dbdisc_amount->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_disc_amount()
    {
        $discAmount = disc_amount::factory()->create();

        $resp = $this->discAmountRepo->delete($discAmount->id);

        $this->assertTrue($resp);
        $this->assertNull(disc_amount::find($discAmount->id), 'disc_amount should not exist in DB');
    }
}
