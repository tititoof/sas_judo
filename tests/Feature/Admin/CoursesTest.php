<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Course;
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
        $course = factory(Course::class)->create();
        $response = $this->get('/api/course', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }
    
    public function testCreateAction()
    {
        $this->setupTests();
        $response = $this->json(
            'GET', 
            '/api/course/create',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
    }
    
    public function testStoreAction()
    {
        $this->setupTests();
        $this->course   = factory(Course::class)->make();
        $startAt        = explode(':', $this->course->start_at);
        $endAt          = explode(':', $this->course->end_at);
        $response       = $this->json(
            'POST',
            '/api/course',
            [
                'name'          => $this->course->name,
                'season_id'     => $this->course->season_id,
                'day'           => $this->course->day,
                'start_at'      => ['HH' => $startAt[0], 'mm' => $startAt[1]],
                'end_at'        => ['HH' => $endAt[0], 'mm' => $endAt[1]],
                'teacher_id'    => $this->course->teacher_id,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('courses', [
            'name'    => $this->course->name,
        ]);
    }
    
    public function testEditAction()
    {
        $this->setupTests();
        $course = factory(Course::class)->create();
        $response = $this->json(
            'GET',
            'api/course/'.$course->id.'/edit',
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
    
    public function testUpdateAction()
    {
        $this->setupTests();
        $this->course   = factory(Course::class)->create();
        $nameChanged    = $this->course->name.' changed';
        $startAt        = explode(':', $this->course->start_at);
        $endAt          = explode(':', $this->course->end_at);
        $response       = $this->json(
            'PUT',
            'api/course/'.$this->course->id,
            [
                'name'          => $nameChanged,
                'season_id'     => $this->course->season_id,
                'day'           => $this->course->day,
                'start_at'      => ['HH' => $startAt[0], 'mm' => $startAt[1]],
                'end_at'        => ['HH' => $endAt[0], 'mm' => $endAt[1]],
                'teacher_id'    => $this->course->teacher_id,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('courses', [
            'id'    => $this->course->id,
            'name'  => $nameChanged,
        ]);
    }
    
    public function testDestroyAction()
    {
        $this->setupTests();
        $this->course   = factory(Course::class)->create();
        $response       = $this->json(
            'DELETE',
            'api/course/'.$this->course->id,
            [],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('courses', [
            'id'    => $this->course->id,
            'name'  => $this->course->name,
        ]);
    }
}