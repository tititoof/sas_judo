<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\AgeCategory;
use Tymon\JWTAuth\Facades\JWTAuth;

class AgeCategoryTest extends TestCase
{
    /**
     * User for test
     */
    private $user  = null;

    /**
     * token for user
     */
    private $token = null;

    /**
     * age categories for testing
     */
    private $ageCategories = null;

    public function setupTests()
    {
        if (null === $this->user) {
            $this->user          = factory(User::class, 'admin')->create();
            $this->ageCategories = factory(AgeCategory::class, 5)->make();
            $this->signIn(['email' => $this->user->email, 'password' => 'secret']);
        }
    }

    public function signIn($data = [ 'email'=>'youremail@yahoo.com', 'password'=>'password' ])
    {
        $response = $this->post('api/signin', $data);
        $content = json_decode($response->getContent());
        $this->assertObjectHasAttribute('meta', $content, 'Token does not exists');
        $this->token = $content->meta->token;

        return $this;
     }

    public function testIndexStatus()
    {
        $this->setupTests();
        $response   = $this->get('/api/age_category', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }

    public function testCreateStatus()
    {
        $this->setupTests();
        foreach ($this->ageCategories as $ageCategory) {
            $response = $this->json(
                'POST',
                'api/age_category',
                [
                    'name'          => $ageCategory->name,
                    'years'         => $ageCategory->years,
                ],
                [
                    'Authorization' => "Bearer ".(string)($this->token),
                ]
            );
            $response->assertStatus(200);
        }
    }

    public function testUpdateStatus()
    {
        $this->setupTests();
        foreach ($this->ageCategories as $ageCategory) {
            $response = $this->json(
                'POST',
                'api/age_category/'.$ageCategory->id,
                [
                    'name'          => $ageCategory->name,
                    'years'         => ($ageCategory->years - 10),
                ],
                [
                    'Authorization' => "Bearer ".(string)($this->token),
                ]
            );
            $response->assertStatus(200);
            $this->assertDatabaseHas('age_categories', [
                'name'          => $ageCategory->name,
                'years'         => ($ageCategory->years - 10),
            ]);
        }
    }
}
