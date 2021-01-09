<?php namespace Tests\Repositories;

use App\Models\drag_form;
use App\Repositories\drag_formRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class drag_formRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var drag_formRepository
     */
    protected $dragFormRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dragFormRepo = \App::make(drag_formRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_drag_form()
    {
        $dragForm = drag_form::factory()->make()->toArray();

        $createddrag_form = $this->dragFormRepo->create($dragForm);

        $createddrag_form = $createddrag_form->toArray();
        $this->assertArrayHasKey('id', $createddrag_form);
        $this->assertNotNull($createddrag_form['id'], 'Created drag_form must have id specified');
        $this->assertNotNull(drag_form::find($createddrag_form['id']), 'drag_form with given id must be in DB');
        $this->assertModelData($dragForm, $createddrag_form);
    }

    /**
     * @test read
     */
    public function test_read_drag_form()
    {
        $dragForm = drag_form::factory()->create();

        $dbdrag_form = $this->dragFormRepo->find($dragForm->id);

        $dbdrag_form = $dbdrag_form->toArray();
        $this->assertModelData($dragForm->toArray(), $dbdrag_form);
    }

    /**
     * @test update
     */
    public function test_update_drag_form()
    {
        $dragForm = drag_form::factory()->create();
        $fakedrag_form = drag_form::factory()->make()->toArray();

        $updateddrag_form = $this->dragFormRepo->update($fakedrag_form, $dragForm->id);

        $this->assertModelData($fakedrag_form, $updateddrag_form->toArray());
        $dbdrag_form = $this->dragFormRepo->find($dragForm->id);
        $this->assertModelData($fakedrag_form, $dbdrag_form->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_drag_form()
    {
        $dragForm = drag_form::factory()->create();

        $resp = $this->dragFormRepo->delete($dragForm->id);

        $this->assertTrue($resp);
        $this->assertNull(drag_form::find($dragForm->id), 'drag_form should not exist in DB');
    }
}
