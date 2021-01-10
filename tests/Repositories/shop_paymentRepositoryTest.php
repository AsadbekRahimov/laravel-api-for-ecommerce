<?php namespace Tests\Repositories;

use App\Models\shop_payment;
use App\Repositories\shop_paymentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_paymentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_paymentRepository
     */
    protected $shopPaymentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopPaymentRepo = \App::make(shop_paymentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_payment()
    {
        $shopPayment = shop_payment::factory()->make()->toArray();

        $createdshop_payment = $this->shopPaymentRepo->create($shopPayment);

        $createdshop_payment = $createdshop_payment->toArray();
        $this->assertArrayHasKey('id', $createdshop_payment);
        $this->assertNotNull($createdshop_payment['id'], 'Created shop_payment must have id specified');
        $this->assertNotNull(shop_payment::find($createdshop_payment['id']), 'shop_payment with given id must be in DB');
        $this->assertModelData($shopPayment, $createdshop_payment);
    }

    /**
     * @test read
     */
    public function test_read_shop_payment()
    {
        $shopPayment = shop_payment::factory()->create();

        $dbshop_payment = $this->shopPaymentRepo->find($shopPayment->id);

        $dbshop_payment = $dbshop_payment->toArray();
        $this->assertModelData($shopPayment->toArray(), $dbshop_payment);
    }

    /**
     * @test update
     */
    public function test_update_shop_payment()
    {
        $shopPayment = shop_payment::factory()->create();
        $fakeshop_payment = shop_payment::factory()->make()->toArray();

        $updatedshop_payment = $this->shopPaymentRepo->update($fakeshop_payment, $shopPayment->id);

        $this->assertModelData($fakeshop_payment, $updatedshop_payment->toArray());
        $dbshop_payment = $this->shopPaymentRepo->find($shopPayment->id);
        $this->assertModelData($fakeshop_payment, $dbshop_payment->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_payment()
    {
        $shopPayment = shop_payment::factory()->create();

        $resp = $this->shopPaymentRepo->delete($shopPayment->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_payment::find($shopPayment->id), 'shop_payment should not exist in DB');
    }
}
