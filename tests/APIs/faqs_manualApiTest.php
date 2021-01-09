<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\faqs_manual;

class faqs_manualApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_faqs_manual()
    {
        $faqsManual = faqs_manual::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/faqs_manuals', $faqsManual
        );

        $this->assertApiResponse($faqsManual);
    }

    /**
     * @test
     */
    public function test_read_faqs_manual()
    {
        $faqsManual = faqs_manual::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/faqs_manuals/'.$faqsManual->id
        );

        $this->assertApiResponse($faqsManual->toArray());
    }

    /**
     * @test
     */
    public function test_update_faqs_manual()
    {
        $faqsManual = faqs_manual::factory()->create();
        $editedfaqs_manual = faqs_manual::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/faqs_manuals/'.$faqsManual->id,
            $editedfaqs_manual
        );

        $this->assertApiResponse($editedfaqs_manual);
    }

    /**
     * @test
     */
    public function test_delete_faqs_manual()
    {
        $faqsManual = faqs_manual::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/faqs_manuals/'.$faqsManual->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/faqs_manuals/'.$faqsManual->id
        );

        $this->response->assertStatus(404);
    }
}
