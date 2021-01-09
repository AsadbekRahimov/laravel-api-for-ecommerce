<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\faqs_type;

class faqs_typeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_faqs_type()
    {
        $faqsType = faqs_type::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/faqs_types', $faqsType
        );

        $this->assertApiResponse($faqsType);
    }

    /**
     * @test
     */
    public function test_read_faqs_type()
    {
        $faqsType = faqs_type::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/faqs_types/'.$faqsType->id
        );

        $this->assertApiResponse($faqsType->toArray());
    }

    /**
     * @test
     */
    public function test_update_faqs_type()
    {
        $faqsType = faqs_type::factory()->create();
        $editedfaqs_type = faqs_type::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/faqs_types/'.$faqsType->id,
            $editedfaqs_type
        );

        $this->assertApiResponse($editedfaqs_type);
    }

    /**
     * @test
     */
    public function test_delete_faqs_type()
    {
        $faqsType = faqs_type::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/faqs_types/'.$faqsType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/faqs_types/'.$faqsType->id
        );

        $this->response->assertStatus(404);
    }
}
