<?php namespace Tests\Repositories;

use App\Models\shop_review;
use App\Repositories\shop_reviewRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_reviewRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_reviewRepository
     */
    protected $shopReviewRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopReviewRepo = \App::make(shop_reviewRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_review()
    {
        $shopReview = shop_review::factory()->make()->toArray();

        $createdshop_review = $this->shopReviewRepo->create($shopReview);

        $createdshop_review = $createdshop_review->toArray();
        $this->assertArrayHasKey('id', $createdshop_review);
        $this->assertNotNull($createdshop_review['id'], 'Created shop_review must have id specified');
        $this->assertNotNull(shop_review::find($createdshop_review['id']), 'shop_review with given id must be in DB');
        $this->assertModelData($shopReview, $createdshop_review);
    }

    /**
     * @test read
     */
    public function test_read_shop_review()
    {
        $shopReview = shop_review::factory()->create();

        $dbshop_review = $this->shopReviewRepo->find($shopReview->id);

        $dbshop_review = $dbshop_review->toArray();
        $this->assertModelData($shopReview->toArray(), $dbshop_review);
    }

    /**
     * @test update
     */
    public function test_update_shop_review()
    {
        $shopReview = shop_review::factory()->create();
        $fakeshop_review = shop_review::factory()->make()->toArray();

        $updatedshop_review = $this->shopReviewRepo->update($fakeshop_review, $shopReview->id);

        $this->assertModelData($fakeshop_review, $updatedshop_review->toArray());
        $dbshop_review = $this->shopReviewRepo->find($shopReview->id);
        $this->assertModelData($fakeshop_review, $dbshop_review->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_review()
    {
        $shopReview = shop_review::factory()->create();

        $resp = $this->shopReviewRepo->delete($shopReview->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_review::find($shopReview->id), 'shop_review should not exist in DB');
    }
}
