<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
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

    public function testEditAction()
    {
        $this->setupTests();
        $this->season = Season::all()->last();
        $response = $this->json(
            'GET',
            'api/season/'.$this->season->id.'/edit',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }

    public function testUpdateAction()
    {
        $this->setupTests();
        $this->season   = Season::all()->last();
        $updatedName    = $this->season->name.' changed';
        $updatedStartAt = new Carbon($this->season->start_at);
        $updatedStartAt->addYears(1);
        $updatedEndAt   = new Carbon($this->season->end_at);
        $updatedEndAt->addYears(1);
        $updatedYear    = $this->season->year + 10;
        $response       = $this->json(
            'PUT',
            'api/season/'.$this->season->id,
            [
                'name'      => $updatedName,
                'start_at'  => $updatedStartAt->format('Y-m-d H:i:s'),
                'end_at'    => $updatedEndAt->format('Y-m-d H:i:s'),
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('seasons', [
            'name'      => $updatedName,
            'start_at'  => $updatedStartAt->format('Y-m-d H:i:s'),
            'end_at'    => $updatedEndAt->format('Y-m-d H:i:s'),
            'id'        => $this->season->id,
        ]);
    }

    public function testDestroyAction()
    {
        $this->setupTests();
        $this->season   = Season::all()->last();
        $response       = $this->json(
            'DELETE',
            'api/season/'.$this->season->id,
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('seasons', [
            'id'    => $this->season->id
        ]);
    }

    public function testGetListAction()
    {
        $this->setupTests();
        $response   = $this->json(
            'GET',
            'api/seasons/list',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
}
