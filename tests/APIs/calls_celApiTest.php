<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_cel;

class calls_celApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_cel()
    {
        $callsCel = calls_cel::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_cels', $callsCel
        );

        $this->assertApiResponse($callsCel);
    }

    /**
     * @test
     */
    public function test_read_calls_cel()
    {
        $callsCel = calls_cel::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_cels/'.$callsCel->id
        );

        $this->assertApiResponse($callsCel->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_cel()
    {
        $callsCel = calls_cel::factory()->create();
        $editedcalls_cel = calls_cel::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_cels/'.$callsCel->id,
            $editedcalls_cel
        );

        $this->assertApiResponse($editedcalls_cel);
    }

    /**
     * @test
     */
    public function test_delete_calls_cel()
    {
        $callsCel = calls_cel::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_cels/'.$callsCel->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_cels/'.$callsCel->id
        );

        $this->response->assertStatus(404);
    }
}
