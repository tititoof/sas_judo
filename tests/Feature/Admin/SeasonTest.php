<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Season;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;

class SeasonTest extends TestCase
{
    /**
     * User traits
     */
    use UserTrait;

    private $season;
    /**
     * Test index, ages categories list
     */
    public function testIndexStatus()
    {
        $this->setupTests();
        $response = $this->get('/api/season', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }

    public function testStoreAction()
    {
        $this->setupTests();
        $this->season = factory(Season::class)->make();
        $response = $this->json(
            'POST',
            '/api/season',
            [
                'name'      => $this->season->name,
                'start_at'  => $this->season->start_at,
                'end_at'    => $this->season->end_at
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
}
