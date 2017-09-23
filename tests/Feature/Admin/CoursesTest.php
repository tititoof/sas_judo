<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Courses;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;

class CoursesTest extends TestCase
{
    
    /**
     * User Trait
     */
    use UserTrait;
    
    /**
     * Categories for testing
     */
    private $course = null;
    
    public function testIndexAction()
    {
        $this->setupTests();
        $response = $this->get('/api/course', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }
}