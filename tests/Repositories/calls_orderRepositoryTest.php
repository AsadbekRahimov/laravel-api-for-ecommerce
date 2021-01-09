<?php namespace Tests\Repositories;

use App\Models\calls_order;
use App\Repositories\calls_orderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class calls_orderRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var calls_orderRepository
     */
    protected $callsOrderRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->callsOrderRepo = \App::make(calls_orderRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_calls_order()
    {
        $callsOrder = calls_order::factory()->make()->toArray();

        $createdcalls_order = $this->callsOrderRepo->create($callsOrder);

        $createdcalls_order = $createdcalls_order->toArray();
        $this->assertArrayHasKey('id', $createdcalls_order);
        $this->assertNotNull($createdcalls_order['id'], 'Created calls_order must have id specified');
        $this->assertNotNull(calls_order::find($createdcalls_order['id']), 'calls_order with given id must be in DB');
        $this->assertModelData($callsOrder, $createdcalls_order);
    }

    /**
     * @test read
     */
    public function test_read_calls_order()
    {
        $callsOrder = calls_order::factory()->create();

        $dbcalls_order = $this->callsOrderRepo->find($callsOrder->id);

        $dbcalls_order = $dbcalls_order->toArray();
        $this->assertModelData($callsOrder->toArray(), $dbcalls_order);
    }

    /**
     * @test update
     */
    public function test_update_calls_order()
    {
        $callsOrder = calls_order::factory()->create();
        $fakecalls_order = calls_order::factory()->make()->toArray();

        $updatedcalls_order = $this->callsOrderRepo->update($fakecalls_order, $callsOrder->id);

        $this->assertModelData($fakecalls_order, $updatedcalls_order->toArray());
        $dbcalls_order = $this->callsOrderRepo->find($callsOrder->id);
        $this->assertModelData($fakecalls_order, $dbcalls_order->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_calls_order()
    {
        $callsOrder = calls_order::factory()->create();

        $resp = $this->callsOrderRepo->delete($callsOrder->id);

        $this->assertTrue($resp);
        $this->assertNull(calls_order::find($callsOrder->id), 'calls_order should not exist in DB');
    }
}
