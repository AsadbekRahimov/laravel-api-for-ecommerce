<?php namespace Tests\Repositories;

use App\Models\govs_position;
use App\Repositories\govs_positionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class govs_positionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var govs_positionRepository
     */
    protected $govsPositionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->govsPositionRepo = \App::make(govs_positionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_govs_position()
    {
        $govsPosition = govs_position::factory()->make()->toArray();

        $createdgovs_position = $this->govsPositionRepo->create($govsPosition);

        $createdgovs_position = $createdgovs_position->toArray();
        $this->assertArrayHasKey('id', $createdgovs_position);
        $this->assertNotNull($createdgovs_position['id'], 'Created govs_position must have id specified');
        $this->assertNotNull(govs_position::find($createdgovs_position['id']), 'govs_position with given id must be in DB');
        $this->assertModelData($govsPosition, $createdgovs_position);
    }

    /**
     * @test read
     */
    public function test_read_govs_position()
    {
        $govsPosition = govs_position::factory()->create();

        $dbgovs_position = $this->govsPositionRepo->find($govsPosition->id);

        $dbgovs_position = $dbgovs_position->toArray();
        $this->assertModelData($govsPosition->toArray(), $dbgovs_position);
    }

    /**
     * @test update
     */
    public function test_update_govs_position()
    {
        $govsPosition = govs_position::factory()->create();
        $fakegovs_position = govs_position::factory()->make()->toArray();

        $updatedgovs_position = $this->govsPositionRepo->update($fakegovs_position, $govsPosition->id);

        $this->assertModelData($fakegovs_position, $updatedgovs_position->toArray());
        $dbgovs_position = $this->govsPositionRepo->find($govsPosition->id);
        $this->assertModelData($fakegovs_position, $dbgovs_position->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_govs_position()
    {
        $govsPosition = govs_position::factory()->create();

        $resp = $this->govsPositionRepo->delete($govsPosition->id);

        $this->assertTrue($resp);
        $this->assertNull(govs_position::find($govsPosition->id), 'govs_position should not exist in DB');
    }
}
