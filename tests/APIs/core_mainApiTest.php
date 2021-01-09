<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\core_main;

class core_mainApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_core_main()
    {
        $coreMain = core_main::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/core_mains', $coreMain
        );

        $this->assertApiResponse($coreMain);
    }

    /**
     * @test
     */
    public function test_read_core_main()
    {
        $coreMain = core_main::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/core_mains/'.$coreMain->id
        );

        $this->assertApiResponse($coreMain->toArray());
    }

    /**
     * @test
     */
    public function test_update_core_main()
    {
        $coreMain = core_main::factory()->create();
        $editedcore_main = core_main::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/core_mains/'.$coreMain->id,
            $editedcore_main
        );

        $this->assertApiResponse($editedcore_main);
    }

    /**
     * @test
     */
    public function test_delete_core_main()
    {
        $coreMain = core_main::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/core_mains/'.$coreMain->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/core_mains/'.$coreMain->id
        );

        $this->response->assertStatus(404);
    }
}
