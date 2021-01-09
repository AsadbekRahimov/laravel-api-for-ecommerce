<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\core_setting;

class core_settingApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_core_setting()
    {
        $coreSetting = core_setting::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/core_settings', $coreSetting
        );

        $this->assertApiResponse($coreSetting);
    }

    /**
     * @test
     */
    public function test_read_core_setting()
    {
        $coreSetting = core_setting::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/core_settings/'.$coreSetting->id
        );

        $this->assertApiResponse($coreSetting->toArray());
    }

    /**
     * @test
     */
    public function test_update_core_setting()
    {
        $coreSetting = core_setting::factory()->create();
        $editedcore_setting = core_setting::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/core_settings/'.$coreSetting->id,
            $editedcore_setting
        );

        $this->assertApiResponse($editedcore_setting);
    }

    /**
     * @test
     */
    public function test_delete_core_setting()
    {
        $coreSetting = core_setting::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/core_settings/'.$coreSetting->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/core_settings/'.$coreSetting->id
        );

        $this->response->assertStatus(404);
    }
}
