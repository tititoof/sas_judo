<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Album;
use App\Models\Picture;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;

class AlbumTest extends TestCase
{
    /**
     * User Trait
     */
    use UserTrait;
    
    /**
     * Album for testing
     */
    private $album = null;
    
    public function testIndexAction()
    {
        $this->setupTests();
        $response = $this->json(
            'GET',
            '/api/album',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
    
    public function testStoreAction()
    {
        $this->setupTests();
        $this->album = factory(Album::class)->make();
        $picture     = factory(Picture::class)->create();
        $response = $this->json(
            'POST',
            '/api/album',
            [
                'name'      => $this->album->name,
                'pictures'  => $picture->id,
                'user_id'   => $this->album->user_id,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas(
            'albums',
            [
                'name' => $this->album->name,
            ]
        );
    }
    
    public function testEditAction()
    {
        $this->setupTests();
        $this->album = factory(Album::class)->create();
        $response = $this->json(
            'GET',
            '/api/album/'.$this->album->id.'/edit',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
    
    public function testUpdateAction()
    {
        $this->setupTests();
        $this->album = factory(Album::class)->create();
        $picture     = factory(Picture::class)->create();
        $nameChanged = $this->album->name.' changed';
        $response = $this->json(
            'PUT',
            '/api/album/'.$this->album->id,
            [
                'name'      => $nameChanged,
                'pictures'  => $picture->id,
                'user_id'   => $this->album->user_id,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas(
            'albums',
            [
                'name' => $nameChanged,
            ]
        );
    }
    
    public function testDestroyAction()
    {
        $this->setupTests();
        $this->album = factory(Album::class)->create();
        $response = $this->json(
            'DELETE',
            '/api/album/'.$this->album->id,
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing(
            'albums',
            [
                'id' => $this->album->id,
            ]
        );
    }
}