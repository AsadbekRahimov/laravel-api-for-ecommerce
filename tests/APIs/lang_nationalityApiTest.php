<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\lang_nationality;

class lang_nationalityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_lang_nationality()
    {
        $langNationality = lang_nationality::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/lang_nationalities', $langNationality
        );

        $this->assertApiResponse($langNationality);
    }

    /**
     * @test
     */
    public function test_read_lang_nationality()
    {
        $langNationality = lang_nationality::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/lang_nationalities/'.$langNationality->id
        );

        $this->assertApiResponse($langNationality->toArray());
    }

    /**
     * @test
     */
    public function test_update_lang_nationality()
    {
        $langNationality = lang_nationality::factory()->create();
        $editedlang_nationality = lang_nationality::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/lang_nationalities/'.$langNationality->id,
            $editedlang_nationality
        );

        $this->assertApiResponse($editedlang_nationality);
    }

    /**
     * @test
     */
    public function test_delete_lang_nationality()
    {
        $langNationality = lang_nationality::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/lang_nationalities/'.$langNationality->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/lang_nationalities/'.$langNationality->id
        );

        $this->response->assertStatus(404);
    }
}
