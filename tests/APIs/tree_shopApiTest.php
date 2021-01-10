<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tree_shop;

class tree_shopApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tree_shop()
    {
        $treeShop = tree_shop::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tree_shops', $treeShop
        );

        $this->assertApiResponse($treeShop);
    }

    /**
     * @test
     */
    public function test_read_tree_shop()
    {
        $treeShop = tree_shop::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tree_shops/'.$treeShop->id
        );

        $this->assertApiResponse($treeShop->toArray());
    }

    /**
     * @test
     */
    public function test_update_tree_shop()
    {
        $treeShop = tree_shop::factory()->create();
        $editedtree_shop = tree_shop::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tree_shops/'.$treeShop->id,
            $editedtree_shop
        );

        $this->assertApiResponse($editedtree_shop);
    }

    /**
     * @test
     */
    public function test_delete_tree_shop()
    {
        $treeShop = tree_shop::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tree_shops/'.$treeShop->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tree_shops/'.$treeShop->id
        );

        $this->response->assertStatus(404);
    }
}
