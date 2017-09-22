<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Result;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;

class ResultTest extends TestCase
{
    /**
     * User Trait
     */
    use UserTrait;

    /**
     * Result
     */
    private $result;

    public function testIndexAction()
    {
        $this->setupTests();
        $response = $this->get('/api/result', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }

    public function testCreateAction()
    {
        $this->setupTests();
        $response = $this->get('api/result/create', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }

    public function testStoreAction()
    {
        $this->setupTests();
        $this->result = factory(Result::class)->make();
        $response = $this->json(
            'POST',
            'api/result/',
            [
                'season_id'     => $this->result->season->id,
                'name'          => $this->result->name,
                'locality'      => $this->result->locality,
                'contest_at'    => $this->result->contest_at->format('Y-m-d H:i:s'),
                'informations'  => $this->result->informations,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('results', [
            'season_id'     => $this->result->season->id,
            'name'          => $this->result->name,
            'locality'      => $this->result->locality,
            'contest_at'    => $this->result->contest_at->format('Y-m-d H:i:s'),
            'informations'  => $this->result->informations,
        ]);
    }

    public function testEditAction()
    {
        $this->setupTests();
        $this->result = factory(Result::class)->create();
        $response = $this->json(
            'GET',
            'api/result/'.$this->result->id.'/edit',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }

    public function testUpdateAction()
    {
        $this->setupTests();
        $this->result = factory(Result::class)->create();
        $response = $this->json(
            'PUT',
            'api/result/'.$this->result->id,
            [
                'season_id'     => $this->result->season->id,
                'name'          => $this->result->name.' changed',
                'locality'      => $this->result->locality.' changed',
                'contest_at'    => $this->result->contest_at->format('Y-m-d H:i:s'),
                'informations'  => $this->result->informations,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('results', [
            'season_id'     => $this->result->season->id,
            'name'          => $this->result->name.' changed',
            'locality'      => $this->result->locality.' changed',
            'contest_at'    => $this->result->contest_at,
            'informations'  => $this->result->informations,
            'id'            => $this->result->id,
        ]);
    }

    public function testDestroyAction()
    {
        $this->setupTests();
        $this->result = factory(Result::class)->create();
        $response = $this->json(
            'DELETE',
            'api/result/'.$this->result->id,
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('results', [
            'id'    => $this->result->id
        ]);
    }

}
