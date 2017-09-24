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
     * Category for testing
     */
    private $category = null;
    
    public function testIndexAction()
    {
        $this->setupTests();
        $response = $this->get('/api/category', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }
    
    public function testCreateAction()
    {
        $this->setupTests();
        $response = $this->json(
            'GET',
            '/api/category/create',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
    
    public function testStoreAction()
    {
        $this->setupTests();
        $this->category = factory(Category::class)->make();
        $response = $this->json(
            'POST',
            'api/category',
            [
                'name' => $this->category->name,
                'type' => $this->category->type,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas(
            'categories',
            [
                'name' => $this->category->name,
            ]
        );
    }
    
    public function testEditAction()
    {
        $this->setupTests();
        $this->category = factory(Category::class)->create();
        $response = $this->json(
            'GET',
            'api/category/'.$this->category->id.'/edit',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
    
    public function testUpdateAction()
    {
        $this->setupTests();
        $this->category = factory(Category::class)->create();
        $nameChanged    = $this->category.' changed';
        $response = $this->json(
            'PUT',
            'api/category/'.$this->category->id,
            [
                'name' => $nameChanged,
                'type' => $this->category->type,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas(
            'categories',
            [
                'name'  => $nameChanged,
                'type'  => $this->category->type,
            ]
        );
    }
    
    public function testDestroyAction()
    {
        $this->setupTests();
        $this->category = factory(Category::class)->create();
        $response = $this->json(
            'DELETE',
            'api/category/'.$this->category->id,
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing(
            'categories',
            [
                'id' => $this->category->id,
            ]
        );
    }
}