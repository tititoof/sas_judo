<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Category;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;

class CategoryTest extends TestCase
{
    
    /**
     * User Trait
     */
    use UserTrait;
    
    /**
     * Categories for testing
     */
    private $categories = null;
    
    public function testIndexAction()
    {
        $this->setupTests();
        $response = $this->get('/api/category', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }
}