<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\doft_signup;

class doft_signupApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_doft_signup()
    {
        $doftSignup = doft_signup::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/doft_signups', $doftSignup
        );

        $this->assertApiResponse($doftSignup);
    }

    /**
     * @test
     */
    public function test_read_doft_signup()
    {
        $doftSignup = doft_signup::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/doft_signups/'.$doftSignup->id
        );

        $this->assertApiResponse($doftSignup->toArray());
    }

    /**
     * @test
     */
    public function test_update_doft_signup()
    {
        $doftSignup = doft_signup::factory()->create();
        $editeddoft_signup = doft_signup::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/doft_signups/'.$doftSignup->id,
            $editeddoft_signup
        );

        $this->assertApiResponse($editeddoft_signup);
    }

    /**
     * @test
     */
    public function test_delete_doft_signup()
    {
        $doftSignup = doft_signup::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/doft_signups/'.$doftSignup->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/doft_signups/'.$doftSignup->id
        );

        $this->response->assertStatus(404);
    }
}
