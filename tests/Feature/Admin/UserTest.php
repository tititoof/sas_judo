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
use Tests\Feature\Admin\UserTrait;

/**
 *
 */
class UserTest extends TestCase
{
    // use DatabaseTransactions;

    /**
     * User traits
     */
    use UserTrait;

    /**
     * Test index, ages categories list
     */
    public function testIndexStatus()
    {
        $this->setupTests();
        $response = $this->get('/api/admin/user', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }

    public function testChangeIsAdmin()
    {
        $this->setupTests();
        $response = $this->json(
            'PUT',
            'api/user/'.$this->user->id.'/toggle/admin',
            [],
            ['Authorization' => "Bearer ".(string)($this->token)]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'name'          => $this->user->name,
            'is_admin'      => 0
        ]);
    }

    public function testChangeIsTeacher()
    {
        $this->setupTests();
        $response = $this->json(
            'PUT',
            'api/user/'.$this->user->id.'/toggle/teacher',
            [],
            ['Authorization' => "Bearer ".(string)($this->token)]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'id'          => $this->user->id,
            'is_teacher'    => 1
        ]);
    }

    public function testChangeIsDebug()
    {
        $this->setupTests();
        $response = $this->json(
            'PUT',
            'api/user/'.$this->user->id.'/toggle/debug',
            [],
            ['Authorization' => "Bearer ".(string)($this->token)]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'name'          => $this->user->name,
            'is_debug'      => 1
        ]);
    }
    
    public function testEditStatus()
    {
        $this->setupTests();
        $response = $this->json(
            'GET',
            'api/admin/user/'.$this->user->id.'/edit',
            [],
            ['Authorization' => "Bearer ".(string)($this->token)]
        );
        $response->assertStatus(200);
    }
    
    public function testUpdateDB()
    {
        $this->setupTests();
        $firstnameChanged   = $this->user->firstname.' changed';
        $lastnameChanged    = $this->user->lastname.' changed';
        $response           = $this->json(
            'PUT',
            'api/admin/user/'.$this->user->id,
            [
                'firstname'     => $firstnameChanged,
                'lastname'      => $lastnameChanged,
                'email'         => $this->user->email,
                'address'       => $this->user->address,
                'phone'         => $this->user->phone,
                'is_admin'      => $this->user->is_admin,
                'is_debug'      => $this->user->is_debug,
                'is_teacher'    => $this->user->is_teacher,
            ],
            ['Authorization' => "Bearer ".(string)($this->token)]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'firstname'     => $firstnameChanged,
            'lastname'      => $lastnameChanged,
            'id'            => $this->user->id,
        ]);
    }
    
    public function testDestroyStatus()
    {
        $this->setupTests();
        $user = User:all()->last();
        $response = $this->json(
            'DELETE',
            'api/admin/user/'.$user->id,
            [],
            ['Authorization' => "Bearer ".(string)($this->token)]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('users', [
            'id'    => $user->id
        ]);
    }

}
