<?php namespace Tests\Repositories;

use App\Models\shop_review_option;
use App\Repositories\shop_review_optionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_review_optionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_review_optionRepository
     */
    protected $shopReviewOptionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopReviewOptionRepo = \App::make(shop_review_optionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_review_option()
    {
        $shopReviewOption = shop_review_option::factory()->make()->toArray();

        $createdshop_review_option = $this->shopReviewOptionRepo->create($shopReviewOption);

        $createdshop_review_option = $createdshop_review_option->toArray();
        $this->assertArrayHasKey('id', $createdshop_review_option);
        $this->assertNotNull($createdshop_review_option['id'], 'Created shop_review_option must have id specified');
        $this->assertNotNull(shop_review_option::find($createdshop_review_option['id']), 'shop_review_option with given id must be in DB');
        $this->assertModelData($shopReviewOption, $createdshop_review_option);
    }

    /**
     * @test read
     */
    public function test_read_shop_review_option()
    {
        $shopReviewOption = shop_review_option::factory()->create();

        $dbshop_review_option = $this->shopReviewOptionRepo->find($shopReviewOption->id);

        $dbshop_review_option = $dbshop_review_option->toArray();
        $this->assertModelData($shopReviewOption->toArray(), $dbshop_review_option);
    }

    /**
     * @test update
     */
    public function test_update_shop_review_option()
    {
        $shopReviewOption = shop_review_option::factory()->create();
        $fakeshop_review_option = shop_review_option::factory()->make()->toArray();

        $updatedshop_review_option = $this->shopReviewOptionRepo->update($fakeshop_review_option, $shopReviewOption->id);

        $this->assertModelData($fakeshop_review_option, $updatedshop_review_option->toArray());
        $dbshop_review_option = $this->shopReviewOptionRepo->find($shopReviewOption->id);
        $this->assertModelData($fakeshop_review_option, $dbshop_review_option->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_review_option()
    {
        $shopReviewOption = shop_review_option::factory()->create();

        $resp = $this->shopReviewOptionRepo->delete($shopReviewOption->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_review_option::find($shopReviewOption->id), 'shop_review_option should not exist in DB');
    }
}
