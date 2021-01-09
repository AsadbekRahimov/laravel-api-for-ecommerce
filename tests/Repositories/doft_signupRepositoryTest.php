<?php namespace Tests\Repositories;

use App\Models\doft_signup;
use App\Repositories\doft_signupRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class doft_signupRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var doft_signupRepository
     */
    protected $doftSignupRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->doftSignupRepo = \App::make(doft_signupRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_doft_signup()
    {
        $doftSignup = doft_signup::factory()->make()->toArray();

        $createddoft_signup = $this->doftSignupRepo->create($doftSignup);

        $createddoft_signup = $createddoft_signup->toArray();
        $this->assertArrayHasKey('id', $createddoft_signup);
        $this->assertNotNull($createddoft_signup['id'], 'Created doft_signup must have id specified');
        $this->assertNotNull(doft_signup::find($createddoft_signup['id']), 'doft_signup with given id must be in DB');
        $this->assertModelData($doftSignup, $createddoft_signup);
    }

    /**
     * @test read
     */
    public function test_read_doft_signup()
    {
        $doftSignup = doft_signup::factory()->create();

        $dbdoft_signup = $this->doftSignupRepo->find($doftSignup->id);

        $dbdoft_signup = $dbdoft_signup->toArray();
        $this->assertModelData($doftSignup->toArray(), $dbdoft_signup);
    }

    /**
     * @test update
     */
    public function test_update_doft_signup()
    {
        $doftSignup = doft_signup::factory()->create();
        $fakedoft_signup = doft_signup::factory()->make()->toArray();

        $updateddoft_signup = $this->doftSignupRepo->update($fakedoft_signup, $doftSignup->id);

        $this->assertModelData($fakedoft_signup, $updateddoft_signup->toArray());
        $dbdoft_signup = $this->doftSignupRepo->find($doftSignup->id);
        $this->assertModelData($fakedoft_signup, $dbdoft_signup->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_doft_signup()
    {
        $doftSignup = doft_signup::factory()->create();

        $resp = $this->doftSignupRepo->delete($doftSignup->id);

        $this->assertTrue($resp);
        $this->assertNull(doft_signup::find($doftSignup->id), 'doft_signup should not exist in DB');
    }
}
