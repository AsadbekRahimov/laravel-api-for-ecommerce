<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_admin;

class calls_adminApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_admin()
    {
        $callsAdmin = calls_admin::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_admins', $callsAdmin
        );

        $this->assertApiResponse($callsAdmin);
    }

    /**
     * @test
     */
    public function test_read_calls_admin()
    {
        $callsAdmin = calls_admin::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_admins/'.$callsAdmin->id
        );

        $this->assertApiResponse($callsAdmin->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_admin()
    {
        $callsAdmin = calls_admin::factory()->create();
        $editedcalls_admin = calls_admin::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_admins/'.$callsAdmin->id,
            $editedcalls_admin
        );

        $this->assertApiResponse($editedcalls_admin);
    }

    /**
     * @test
     */
    public function test_delete_calls_admin()
    {
        $callsAdmin = calls_admin::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_admins/'.$callsAdmin->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_admins/'.$callsAdmin->id
        );

        $this->response->assertStatus(404);
    }
}
