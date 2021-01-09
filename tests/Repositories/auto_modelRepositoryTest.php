<?php namespace Tests\Repositories;

use App\Models\auto_model;
use App\Repositories\auto_modelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class auto_modelRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var auto_modelRepository
     */
    protected $autoModelRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->autoModelRepo = \App::make(auto_modelRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_auto_model()
    {
        $autoModel = auto_model::factory()->make()->toArray();

        $createdauto_model = $this->autoModelRepo->create($autoModel);

        $createdauto_model = $createdauto_model->toArray();
        $this->assertArrayHasKey('id', $createdauto_model);
        $this->assertNotNull($createdauto_model['id'], 'Created auto_model must have id specified');
        $this->assertNotNull(auto_model::find($createdauto_model['id']), 'auto_model with given id must be in DB');
        $this->assertModelData($autoModel, $createdauto_model);
    }

    /**
     * @test read
     */
    public function test_read_auto_model()
    {
        $autoModel = auto_model::factory()->create();

        $dbauto_model = $this->autoModelRepo->find($autoModel->id);

        $dbauto_model = $dbauto_model->toArray();
        $this->assertModelData($autoModel->toArray(), $dbauto_model);
    }

    /**
     * @test update
     */
    public function test_update_auto_model()
    {
        $autoModel = auto_model::factory()->create();
        $fakeauto_model = auto_model::factory()->make()->toArray();

        $updatedauto_model = $this->autoModelRepo->update($fakeauto_model, $autoModel->id);

        $this->assertModelData($fakeauto_model, $updatedauto_model->toArray());
        $dbauto_model = $this->autoModelRepo->find($autoModel->id);
        $this->assertModelData($fakeauto_model, $dbauto_model->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_auto_model()
    {
        $autoModel = auto_model::factory()->create();

        $resp = $this->autoModelRepo->delete($autoModel->id);

        $this->assertTrue($resp);
        $this->assertNull(auto_model::find($autoModel->id), 'auto_model should not exist in DB');
    }
}
