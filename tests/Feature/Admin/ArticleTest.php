<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Article;
use App\Models\Album;
use App\Models\Category;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;

class ArticleTest extends TestCase
{
    /**
     * User Trait
     */
    use UserTrait;
    
    /**
     * Article for testing
     */
    private $article = null;
    
    public function testIndexAction()
    {
        $this->setupTests();
        
        $response = $this->json(
            'GET',
            '/api/article',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
    
    public function testCreateAction()
    {
        $this->setupTests();
        $response = $this->json(
            'GET',
            '/api/article/create',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
    
    public function testStoreAction()
    {
        $this->setupTests();
        $this->article  = factory(Article::class)->make();
        $album          = factory(Album::class)->create();
        $category       = factory(Category::class)->create();
        $response = $this->json(
            'POST',
            '/api/article',
            [
                'name'          => $this->article->name,
                'content'       => $this->article->content,
                'categories'    => [$category->id],
                'albums'        => [$album->id],
                'user_id'       => $this->article->user_id,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas(
            'articles',
            [
                'name'  => $this->article->name
            ]
        );
    }
    
    public function testEditAction()
    {
        $this->setupTests();
        $this->article = factory(Article::class)->create();
        $response = $this->json(
            'GET',
            '/api/article/'.$this->article->id.'/edit',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
    
    public function testUpdateAction()
    {
        $this->setupTests();
        $this->article  = factory(Article::class)->create();
        $album          = factory(Album::class)->create();
        $category       = factory(Category::class)->create();
        $nameChanged    = $this->article->name.' changed';
        $response = $this->json(
            'PUT',
            '/api/article/'.$this->article->id,
            [
                'name'          => $nameChanged,
                'content'       => $this->article->content,
                'categories'    => [$category->id],
                'albums'        => [$album->id],
                'user_id'       => $this->article->user_id,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas(
            'articles',
            [
                'id'    => $this->article->id,
                'name'  => $nameChanged
            ]
        );
    }
    
    public function testDestroyAction()
    {
        $this->setupTests();
        $this->article  = factory(Article::class)->create();
        $response = $this->json(
            'DELETE',
            '/api/article/'.$this->article->id,
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing(
            'articles',
            [
                'id'    => $this->article->id,
            ]
        );
    }
}