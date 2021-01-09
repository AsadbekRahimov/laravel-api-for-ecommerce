<?php namespace Tests\Repositories;

use App\Models\auto;
use App\Repositories\autoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class autoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var autoRepository
     */
    protected $autoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->autoRepo = \App::make(autoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_auto()
    {
        $auto = auto::factory()->make()->toArray();

        $createdauto = $this->autoRepo->create($auto);

        $createdauto = $createdauto->toArray();
        $this->assertArrayHasKey('id', $createdauto);
        $this->assertNotNull($createdauto['id'], 'Created auto must have id specified');
        $this->assertNotNull(auto::find($createdauto['id']), 'auto with given id must be in DB');
        $this->assertModelData($auto, $createdauto);
    }

    /**
     * @test read
     */
    public function test_read_auto()
    {
        $auto = auto::factory()->create();

        $dbauto = $this->autoRepo->find($auto->id);

        $dbauto = $dbauto->toArray();
        $this->assertModelData($auto->toArray(), $dbauto);
    }

    /**
     * @test update
     */
    public function test_update_auto()
    {
        $auto = auto::factory()->create();
        $fakeauto = auto::factory()->make()->toArray();

        $updatedauto = $this->autoRepo->update($fakeauto, $auto->id);

        $this->assertModelData($fakeauto, $updatedauto->toArray());
        $dbauto = $this->autoRepo->find($auto->id);
        $this->assertModelData($fakeauto, $dbauto->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_auto()
    {
        $auto = auto::factory()->create();

        $resp = $this->autoRepo->delete($auto->id);

        $this->assertTrue($resp);
        $this->assertNull(auto::find($auto->id), 'auto should not exist in DB');
    }
}
