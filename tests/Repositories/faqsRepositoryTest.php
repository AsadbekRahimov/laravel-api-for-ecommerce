<?php namespace Tests\Repositories;

use App\Models\faqs;
use App\Repositories\faqsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class faqsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var faqsRepository
     */
    protected $faqsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->faqsRepo = \App::make(faqsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_faqs()
    {
        $faqs = faqs::factory()->make()->toArray();

        $createdfaqs = $this->faqsRepo->create($faqs);

        $createdfaqs = $createdfaqs->toArray();
        $this->assertArrayHasKey('id', $createdfaqs);
        $this->assertNotNull($createdfaqs['id'], 'Created faqs must have id specified');
        $this->assertNotNull(faqs::find($createdfaqs['id']), 'faqs with given id must be in DB');
        $this->assertModelData($faqs, $createdfaqs);
    }

    /**
     * @test read
     */
    public function test_read_faqs()
    {
        $faqs = faqs::factory()->create();

        $dbfaqs = $this->faqsRepo->find($faqs->id);

        $dbfaqs = $dbfaqs->toArray();
        $this->assertModelData($faqs->toArray(), $dbfaqs);
    }

    /**
     * @test update
     */
    public function test_update_faqs()
    {
        $faqs = faqs::factory()->create();
        $fakefaqs = faqs::factory()->make()->toArray();

        $updatedfaqs = $this->faqsRepo->update($fakefaqs, $faqs->id);

        $this->assertModelData($fakefaqs, $updatedfaqs->toArray());
        $dbfaqs = $this->faqsRepo->find($faqs->id);
        $this->assertModelData($fakefaqs, $dbfaqs->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_faqs()
    {
        $faqs = faqs::factory()->create();

        $resp = $this->faqsRepo->delete($faqs->id);

        $this->assertTrue($resp);
        $this->assertNull(faqs::find($faqs->id), 'faqs should not exist in DB');
    }
}
