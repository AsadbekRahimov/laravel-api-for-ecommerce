<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\faqs;

class faqsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_faqs()
    {
        $faqs = faqs::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/faqs', $faqs
        );

        $this->assertApiResponse($faqs);
    }

    /**
     * @test
     */
    public function test_read_faqs()
    {
        $faqs = faqs::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/faqs/'.$faqs->id
        );

        $this->assertApiResponse($faqs->toArray());
    }

    /**
     * @test
     */
    public function test_update_faqs()
    {
        $faqs = faqs::factory()->create();
        $editedfaqs = faqs::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/faqs/'.$faqs->id,
            $editedfaqs
        );

        $this->assertApiResponse($editedfaqs);
    }

    /**
     * @test
     */
    public function test_delete_faqs()
    {
        $faqs = faqs::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/faqs/'.$faqs->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/faqs/'.$faqs->id
        );

        $this->response->assertStatus(404);
    }
}
