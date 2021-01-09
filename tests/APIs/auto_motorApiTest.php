<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\auto_motor;

class auto_motorApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_auto_motor()
    {
        $autoMotor = auto_motor::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/auto_motors', $autoMotor
        );

        $this->assertApiResponse($autoMotor);
    }

    /**
     * @test
     */
    public function test_read_auto_motor()
    {
        $autoMotor = auto_motor::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/auto_motors/'.$autoMotor->id
        );

        $this->assertApiResponse($autoMotor->toArray());
    }

    /**
     * @test
     */
    public function test_update_auto_motor()
    {
        $autoMotor = auto_motor::factory()->create();
        $editedauto_motor = auto_motor::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/auto_motors/'.$autoMotor->id,
            $editedauto_motor
        );

        $this->assertApiResponse($editedauto_motor);
    }

    /**
     * @test
     */
    public function test_delete_auto_motor()
    {
        $autoMotor = auto_motor::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/auto_motors/'.$autoMotor->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/auto_motors/'.$autoMotor->id
        );

        $this->response->assertStatus(404);
    }
}
