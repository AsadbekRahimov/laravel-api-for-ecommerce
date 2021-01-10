<?php namespace Tests\Repositories;

use App\Models\shop_question;
use App\Repositories\shop_questionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class shop_questionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var shop_questionRepository
     */
    protected $shopQuestionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shopQuestionRepo = \App::make(shop_questionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shop_question()
    {
        $shopQuestion = shop_question::factory()->make()->toArray();

        $createdshop_question = $this->shopQuestionRepo->create($shopQuestion);

        $createdshop_question = $createdshop_question->toArray();
        $this->assertArrayHasKey('id', $createdshop_question);
        $this->assertNotNull($createdshop_question['id'], 'Created shop_question must have id specified');
        $this->assertNotNull(shop_question::find($createdshop_question['id']), 'shop_question with given id must be in DB');
        $this->assertModelData($shopQuestion, $createdshop_question);
    }

    /**
     * @test read
     */
    public function test_read_shop_question()
    {
        $shopQuestion = shop_question::factory()->create();

        $dbshop_question = $this->shopQuestionRepo->find($shopQuestion->id);

        $dbshop_question = $dbshop_question->toArray();
        $this->assertModelData($shopQuestion->toArray(), $dbshop_question);
    }

    /**
     * @test update
     */
    public function test_update_shop_question()
    {
        $shopQuestion = shop_question::factory()->create();
        $fakeshop_question = shop_question::factory()->make()->toArray();

        $updatedshop_question = $this->shopQuestionRepo->update($fakeshop_question, $shopQuestion->id);

        $this->assertModelData($fakeshop_question, $updatedshop_question->toArray());
        $dbshop_question = $this->shopQuestionRepo->find($shopQuestion->id);
        $this->assertModelData($fakeshop_question, $dbshop_question->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shop_question()
    {
        $shopQuestion = shop_question::factory()->create();

        $resp = $this->shopQuestionRepo->delete($shopQuestion->id);

        $this->assertTrue($resp);
        $this->assertNull(shop_question::find($shopQuestion->id), 'shop_question should not exist in DB');
    }
}
