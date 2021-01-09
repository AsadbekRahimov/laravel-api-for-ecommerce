<?php namespace Tests\Repositories;

use App\Models\auto_motor;
use App\Repositories\auto_motorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class auto_motorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var auto_motorRepository
     */
    protected $autoMotorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->autoMotorRepo = \App::make(auto_motorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_auto_motor()
    {
        $autoMotor = auto_motor::factory()->make()->toArray();

        $createdauto_motor = $this->autoMotorRepo->create($autoMotor);

        $createdauto_motor = $createdauto_motor->toArray();
        $this->assertArrayHasKey('id', $createdauto_motor);
        $this->assertNotNull($createdauto_motor['id'], 'Created auto_motor must have id specified');
        $this->assertNotNull(auto_motor::find($createdauto_motor['id']), 'auto_motor with given id must be in DB');
        $this->assertModelData($autoMotor, $createdauto_motor);
    }

    /**
     * @test read
     */
    public function test_read_auto_motor()
    {
        $autoMotor = auto_motor::factory()->create();

        $dbauto_motor = $this->autoMotorRepo->find($autoMotor->id);

        $dbauto_motor = $dbauto_motor->toArray();
        $this->assertModelData($autoMotor->toArray(), $dbauto_motor);
    }

    /**
     * @test update
     */
    public function test_update_auto_motor()
    {
        $autoMotor = auto_motor::factory()->create();
        $fakeauto_motor = auto_motor::factory()->make()->toArray();

        $updatedauto_motor = $this->autoMotorRepo->update($fakeauto_motor, $autoMotor->id);

        $this->assertModelData($fakeauto_motor, $updatedauto_motor->toArray());
        $dbauto_motor = $this->autoMotorRepo->find($autoMotor->id);
        $this->assertModelData($fakeauto_motor, $dbauto_motor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_auto_motor()
    {
        $autoMotor = auto_motor::factory()->create();

        $resp = $this->autoMotorRepo->delete($autoMotor->id);

        $this->assertTrue($resp);
        $this->assertNull(auto_motor::find($autoMotor->id), 'auto_motor should not exist in DB');
    }
}
