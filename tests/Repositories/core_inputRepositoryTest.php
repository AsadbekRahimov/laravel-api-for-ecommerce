<?php namespace Tests\Repositories;

use App\Models\core_input;
use App\Repositories\core_inputRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class core_inputRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var core_inputRepository
     */
    protected $coreInputRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coreInputRepo = \App::make(core_inputRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_core_input()
    {
        $coreInput = core_input::factory()->make()->toArray();

        $createdcore_input = $this->coreInputRepo->create($coreInput);

        $createdcore_input = $createdcore_input->toArray();
        $this->assertArrayHasKey('id', $createdcore_input);
        $this->assertNotNull($createdcore_input['id'], 'Created core_input must have id specified');
        $this->assertNotNull(core_input::find($createdcore_input['id']), 'core_input with given id must be in DB');
        $this->assertModelData($coreInput, $createdcore_input);
    }

    /**
     * @test read
     */
    public function test_read_core_input()
    {
        $coreInput = core_input::factory()->create();

        $dbcore_input = $this->coreInputRepo->find($coreInput->id);

        $dbcore_input = $dbcore_input->toArray();
        $this->assertModelData($coreInput->toArray(), $dbcore_input);
    }

    /**
     * @test update
     */
    public function test_update_core_input()
    {
        $coreInput = core_input::factory()->create();
        $fakecore_input = core_input::factory()->make()->toArray();

        $updatedcore_input = $this->coreInputRepo->update($fakecore_input, $coreInput->id);

        $this->assertModelData($fakecore_input, $updatedcore_input->toArray());
        $dbcore_input = $this->coreInputRepo->find($coreInput->id);
        $this->assertModelData($fakecore_input, $dbcore_input->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_core_input()
    {
        $coreInput = core_input::factory()->create();

        $resp = $this->coreInputRepo->delete($coreInput->id);

        $this->assertTrue($resp);
        $this->assertNull(core_input::find($coreInput->id), 'core_input should not exist in DB');
    }
}
