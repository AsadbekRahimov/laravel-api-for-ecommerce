<?php namespace Tests\Repositories;

use App\Models\auto_type;
use App\Repositories\auto_typeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class auto_typeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var auto_typeRepository
     */
    protected $autoTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->autoTypeRepo = \App::make(auto_typeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_auto_type()
    {
        $autoType = auto_type::factory()->make()->toArray();

        $createdauto_type = $this->autoTypeRepo->create($autoType);

        $createdauto_type = $createdauto_type->toArray();
        $this->assertArrayHasKey('id', $createdauto_type);
        $this->assertNotNull($createdauto_type['id'], 'Created auto_type must have id specified');
        $this->assertNotNull(auto_type::find($createdauto_type['id']), 'auto_type with given id must be in DB');
        $this->assertModelData($autoType, $createdauto_type);
    }

    /**
     * @test read
     */
    public function test_read_auto_type()
    {
        $autoType = auto_type::factory()->create();

        $dbauto_type = $this->autoTypeRepo->find($autoType->id);

        $dbauto_type = $dbauto_type->toArray();
        $this->assertModelData($autoType->toArray(), $dbauto_type);
    }

    /**
     * @test update
     */
    public function test_update_auto_type()
    {
        $autoType = auto_type::factory()->create();
        $fakeauto_type = auto_type::factory()->make()->toArray();

        $updatedauto_type = $this->autoTypeRepo->update($fakeauto_type, $autoType->id);

        $this->assertModelData($fakeauto_type, $updatedauto_type->toArray());
        $dbauto_type = $this->autoTypeRepo->find($autoType->id);
        $this->assertModelData($fakeauto_type, $dbauto_type->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_auto_type()
    {
        $autoType = auto_type::factory()->create();

        $resp = $this->autoTypeRepo->delete($autoType->id);

        $this->assertTrue($resp);
        $this->assertNull(auto_type::find($autoType->id), 'auto_type should not exist in DB');
    }
}
