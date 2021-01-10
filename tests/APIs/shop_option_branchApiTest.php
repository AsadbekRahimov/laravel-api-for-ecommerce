<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\shop_option_branch;

class shop_option_branchApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shop_option_branch()
    {
        $shopOptionBranch = shop_option_branch::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shop_option_branches', $shopOptionBranch
        );

        $this->assertApiResponse($shopOptionBranch);
    }

    /**
     * @test
     */
    public function test_read_shop_option_branch()
    {
        $shopOptionBranch = shop_option_branch::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shop_option_branches/'.$shopOptionBranch->id
        );

        $this->assertApiResponse($shopOptionBranch->toArray());
    }

    /**
     * @test
     */
    public function test_update_shop_option_branch()
    {
        $shopOptionBranch = shop_option_branch::factory()->create();
        $editedshop_option_branch = shop_option_branch::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shop_option_branches/'.$shopOptionBranch->id,
            $editedshop_option_branch
        );

        $this->assertApiResponse($editedshop_option_branch);
    }

    /**
     * @test
     */
    public function test_delete_shop_option_branch()
    {
        $shopOptionBranch = shop_option_branch::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shop_option_branches/'.$shopOptionBranch->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shop_option_branches/'.$shopOptionBranch->id
        );

        $this->response->assertStatus(404);
    }
}
