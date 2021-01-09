<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\lang;

class langApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_lang()
    {
        $lang = lang::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/langs', $lang
        );

        $this->assertApiResponse($lang);
    }

    /**
     * @test
     */
    public function test_read_lang()
    {
        $lang = lang::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/langs/'.$lang->id
        );

        $this->assertApiResponse($lang->toArray());
    }

    /**
     * @test
     */
    public function test_update_lang()
    {
        $lang = lang::factory()->create();
        $editedlang = lang::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/langs/'.$lang->id,
            $editedlang
        );

        $this->assertApiResponse($editedlang);
    }

    /**
     * @test
     */
    public function test_delete_lang()
    {
        $lang = lang::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/langs/'.$lang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/langs/'.$lang->id
        );

        $this->response->assertStatus(404);
    }
}
