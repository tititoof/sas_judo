<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Judoevent;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;

class JudoeventTest extends TestCase
{
    /**
     * User Trait
     */
    use UserTrait;
    
    private $event;
    
    public function testIndexAction()
    {
        $this->setupTests();
        $response = $this->get('api/judoevent', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }
    
    public function testStoreAction()
    {
        $this->setupTests();
        $this->event = factory(Judoevent::class)->make();
        $response = $this->json(
            'POST',
            'api/judoevent',
            [
                'name'          => $this->event->name,
                'type'          => $this->event->type,
                'description'   => $this->event->description,
                'start_at'      => $this->event->start_at->format('Y-m-d'),
                'end_at'        => $this->event->end_at->format('Y-m-d'),
                'end_time_at'   => ['HH' => $this->event->end_at->format('H'), 'mm' => $this->event->end_at->format('i')],
                'start_time_at' => ['HH' => $this->event->start_at->format('H'), 'mm' => $this->event->start_at->format('i')],
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
    
    public function testShowAction()
    {
        $this->setupTests();
        $this->event = factory(Judoevent::class)->create();
        $response = $this->json(
            'GET',
            'api/judoevent/'.$this->event->id,
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
    
    public function testEditAction()
    {
        $this->setupTests();
        $this->event = factory(Judoevent::class)->create();
        $response = $this->json(
            'GET',
            'api/judoevent/'.$this->event->id.'/edit',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        
        $response->assertStatus(200);
    }
    
    public function testUpdateAction()
    {
        $this->setupTests();
        $this->event = factory(Judoevent::class)->create();
        $nameChanged = $this->event->name.' Changed';
        $response = $this->json(
            'PUT',
            'api/judoevent/'.$this->event->id,
            [
                'name'          => $nameChanged,
                'type'          => $this->event->type,
                'description'   => $this->event->description,
                'start_at'      => $this->event->start_at->format('Y-m-d'),
                'end_at'        => $this->event->end_at->format('Y-m-d'),
                'end_time_at'   => ['HH' => $this->event->end_at->format('H'), 'mm' => $this->event->end_at->format('i')],
                'start_time_at' => ['HH' => $this->event->start_at->format('H'), 'mm' => $this->event->start_at->format('i')],
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('judo_events', [
            'id'            => $this->event->id,
            'name'          => $nameChanged,
        ]);
    }
    
    public function testDestroyAction()
    {
        $this->setupTests();
        $this->event = factory(Judoevent::class)->create();
        $response = $this->json(
            'DELETE',
            'api/judoevent/'.$this->event->id,
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('judo_events', [
            'id'            => $this->event->id,
        ]);
    }
    
}