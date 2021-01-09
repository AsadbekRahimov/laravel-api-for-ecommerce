<?php namespace Tests\Repositories;

use App\Models\news_type;
use App\Repositories\news_typeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class news_typeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var news_typeRepository
     */
    protected $newsTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->newsTypeRepo = \App::make(news_typeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_news_type()
    {
        $newsType = news_type::factory()->make()->toArray();

        $creatednews_type = $this->newsTypeRepo->create($newsType);

        $creatednews_type = $creatednews_type->toArray();
        $this->assertArrayHasKey('id', $creatednews_type);
        $this->assertNotNull($creatednews_type['id'], 'Created news_type must have id specified');
        $this->assertNotNull(news_type::find($creatednews_type['id']), 'news_type with given id must be in DB');
        $this->assertModelData($newsType, $creatednews_type);
    }

    /**
     * @test read
     */
    public function test_read_news_type()
    {
        $newsType = news_type::factory()->create();

        $dbnews_type = $this->newsTypeRepo->find($newsType->id);

        $dbnews_type = $dbnews_type->toArray();
        $this->assertModelData($newsType->toArray(), $dbnews_type);
    }

    /**
     * @test update
     */
    public function test_update_news_type()
    {
        $newsType = news_type::factory()->create();
        $fakenews_type = news_type::factory()->make()->toArray();

        $updatednews_type = $this->newsTypeRepo->update($fakenews_type, $newsType->id);

        $this->assertModelData($fakenews_type, $updatednews_type->toArray());
        $dbnews_type = $this->newsTypeRepo->find($newsType->id);
        $this->assertModelData($fakenews_type, $dbnews_type->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_news_type()
    {
        $newsType = news_type::factory()->create();

        $resp = $this->newsTypeRepo->delete($newsType->id);

        $this->assertTrue($resp);
        $this->assertNull(news_type::find($newsType->id), 'news_type should not exist in DB');
    }
}
