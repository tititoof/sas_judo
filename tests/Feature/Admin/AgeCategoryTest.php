<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AgeCategoryTest extends TestCase
{
    private $token = null;

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
        $user       = factory(User::class, 'admin')->create();
        $this->signIn(['email' => $user->email, 'password' => 'secret']);
        $response   = $this->get('/api/age_category', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }
}
