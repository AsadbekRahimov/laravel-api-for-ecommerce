<?php namespace Tests\Repositories;

use App\Models\faqs_manual;
use App\Repositories\faqs_manualRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class faqs_manualRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var faqs_manualRepository
     */
    protected $faqsManualRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->faqsManualRepo = \App::make(faqs_manualRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_faqs_manual()
    {
        $faqsManual = faqs_manual::factory()->make()->toArray();

        $createdfaqs_manual = $this->faqsManualRepo->create($faqsManual);

        $createdfaqs_manual = $createdfaqs_manual->toArray();
        $this->assertArrayHasKey('id', $createdfaqs_manual);
        $this->assertNotNull($createdfaqs_manual['id'], 'Created faqs_manual must have id specified');
        $this->assertNotNull(faqs_manual::find($createdfaqs_manual['id']), 'faqs_manual with given id must be in DB');
        $this->assertModelData($faqsManual, $createdfaqs_manual);
    }

    /**
     * @test read
     */
    public function test_read_faqs_manual()
    {
        $faqsManual = faqs_manual::factory()->create();

        $dbfaqs_manual = $this->faqsManualRepo->find($faqsManual->id);

        $dbfaqs_manual = $dbfaqs_manual->toArray();
        $this->assertModelData($faqsManual->toArray(), $dbfaqs_manual);
    }

    /**
     * @test update
     */
    public function test_update_faqs_manual()
    {
        $faqsManual = faqs_manual::factory()->create();
        $fakefaqs_manual = faqs_manual::factory()->make()->toArray();

        $updatedfaqs_manual = $this->faqsManualRepo->update($fakefaqs_manual, $faqsManual->id);

        $this->assertModelData($fakefaqs_manual, $updatedfaqs_manual->toArray());
        $dbfaqs_manual = $this->faqsManualRepo->find($faqsManual->id);
        $this->assertModelData($fakefaqs_manual, $dbfaqs_manual->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_faqs_manual()
    {
        $faqsManual = faqs_manual::factory()->create();

        $resp = $this->faqsManualRepo->delete($faqsManual->id);

        $this->assertTrue($resp);
        $this->assertNull(faqs_manual::find($faqsManual->id), 'faqs_manual should not exist in DB');
    }
}
