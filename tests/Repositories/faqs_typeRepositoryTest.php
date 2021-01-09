<?php namespace Tests\Repositories;

use App\Models\faqs_type;
use App\Repositories\faqs_typeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class faqs_typeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var faqs_typeRepository
     */
    protected $faqsTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->faqsTypeRepo = \App::make(faqs_typeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_faqs_type()
    {
        $faqsType = faqs_type::factory()->make()->toArray();

        $createdfaqs_type = $this->faqsTypeRepo->create($faqsType);

        $createdfaqs_type = $createdfaqs_type->toArray();
        $this->assertArrayHasKey('id', $createdfaqs_type);
        $this->assertNotNull($createdfaqs_type['id'], 'Created faqs_type must have id specified');
        $this->assertNotNull(faqs_type::find($createdfaqs_type['id']), 'faqs_type with given id must be in DB');
        $this->assertModelData($faqsType, $createdfaqs_type);
    }

    /**
     * @test read
     */
    public function test_read_faqs_type()
    {
        $faqsType = faqs_type::factory()->create();

        $dbfaqs_type = $this->faqsTypeRepo->find($faqsType->id);

        $dbfaqs_type = $dbfaqs_type->toArray();
        $this->assertModelData($faqsType->toArray(), $dbfaqs_type);
    }

    /**
     * @test update
     */
    public function test_update_faqs_type()
    {
        $faqsType = faqs_type::factory()->create();
        $fakefaqs_type = faqs_type::factory()->make()->toArray();

        $updatedfaqs_type = $this->faqsTypeRepo->update($fakefaqs_type, $faqsType->id);

        $this->assertModelData($fakefaqs_type, $updatedfaqs_type->toArray());
        $dbfaqs_type = $this->faqsTypeRepo->find($faqsType->id);
        $this->assertModelData($fakefaqs_type, $dbfaqs_type->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_faqs_type()
    {
        $faqsType = faqs_type::factory()->create();

        $resp = $this->faqsTypeRepo->delete($faqsType->id);

        $this->assertTrue($resp);
        $this->assertNull(faqs_type::find($faqsType->id), 'faqs_type should not exist in DB');
    }
}
