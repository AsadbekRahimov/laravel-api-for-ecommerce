<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\calls_record;

class calls_recordApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_calls_record()
    {
        $callsRecord = calls_record::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/calls_records', $callsRecord
        );

        $this->assertApiResponse($callsRecord);
    }

    /**
     * @test
     */
    public function test_read_calls_record()
    {
        $callsRecord = calls_record::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/calls_records/'.$callsRecord->id
        );

        $this->assertApiResponse($callsRecord->toArray());
    }

    /**
     * @test
     */
    public function test_update_calls_record()
    {
        $callsRecord = calls_record::factory()->create();
        $editedcalls_record = calls_record::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/calls_records/'.$callsRecord->id,
            $editedcalls_record
        );

        $this->assertApiResponse($editedcalls_record);
    }

    /**
     * @test
     */
    public function test_delete_calls_record()
    {
        $callsRecord = calls_record::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/calls_records/'.$callsRecord->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/calls_records/'.$callsRecord->id
        );

        $this->response->assertStatus(404);
    }
}
