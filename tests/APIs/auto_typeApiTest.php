<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\auto_type;

class auto_typeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_auto_type()
    {
        $autoType = auto_type::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/auto_types', $autoType
        );

        $this->assertApiResponse($autoType);
    }

    /**
     * @test
     */
    public function test_read_auto_type()
    {
        $autoType = auto_type::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/auto_types/'.$autoType->id
        );

        $this->assertApiResponse($autoType->toArray());
    }

    /**
     * @test
     */
    public function test_update_auto_type()
    {
        $autoType = auto_type::factory()->create();
        $editedauto_type = auto_type::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/auto_types/'.$autoType->id,
            $editedauto_type
        );

        $this->assertApiResponse($editedauto_type);
    }

    /**
     * @test
     */
    public function test_delete_auto_type()
    {
        $autoType = auto_type::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/auto_types/'.$autoType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/auto_types/'.$autoType->id
        );

        $this->response->assertStatus(404);
    }
}
