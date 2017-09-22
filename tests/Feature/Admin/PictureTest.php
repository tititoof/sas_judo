<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Picture;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;
use Illuminate\Http\UploadedFile;

class PictureTest extends TestCase
{
    /**
     * User Trait
     */
    use UserTrait;

    /**
     * Picture
     */
    private $picture;

    public function testStoreAction()
    {
        $this->setupTests();
        $response = $this->json(
            'POST',
            '/api/picture',
            [
                'file'  => UploadedFile::fake()->image('avatar.jpg', 640, 480),
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );

        $response->assertStatus(200);
    }

    public function testShowAction()
    {
        $this->setupTests();
        $picture  = factory(Picture::class)->create();
        $response = $this->json(
            'GET',
            '/api/picture/'.$picture->id,
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );

        $response->assertStatus(200);
    }

}
