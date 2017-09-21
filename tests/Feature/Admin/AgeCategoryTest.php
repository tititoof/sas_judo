<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\AgeCategory;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;

class AgeCategoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * User Trait
     */
    use UserTrait;

    /**
     * Age categories for testing
     */
    private $ageCategories = null;

    /**
     * Setup age categories factory
     */
    public function setupAgeCategories()
    {
        $this->ageCategories = factory(AgeCategory::class, 5)->make();
    }

    /**
     * Test index, ages categories list
     */
    public function testIndexStatus()
    {
        $this->setupTests();
        $response = $this->get('/api/age_category', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }

    /**
     * Test create age category
     */
    public function testCreateStatus()
    {
        $this->setupTests();
        $this->setupAgeCategories();
        foreach ($this->ageCategories as $ageCategory) {
            $response = $this->json(
                'POST',
                'api/age_category',
                [
                    'name'          => $ageCategory->name,
                    'years'         => $ageCategory->years,
                ],
                [
                    'Authorization' => "Bearer ".(string)($this->token),
                ]
            );
            $response->assertStatus(200);
        }
    }

    /**
     * test edit json
     */
    public function testEditStatus()
    {
        $this->setupTests();
        $ageCategory = AgeCategory::all()->first();
        $response = $this->json(
            'GET',
            'api/age_category/'.$ageCategory->id.'/edit',
            [],
            [
                'Authorization' => "Bearer ".(string)($this->token),
            ]
        );
        $response
                ->assertStatus(200)
                ->assertExactJson([
                    'ageCategory' => [
                        "created_at" => $ageCategory->created_at->toDateTimeString(),
                        "id"         => $ageCategory->id,
                        "name"       => $ageCategory->name,
                        "updated_at" => $ageCategory->updated_at->toDateTimeString(),
                        "years"      => $ageCategory->years
                    ],
                ]);
    }


    /**
     * test update
     */
    public function testUpdateStatus()
    {
        $this->setupTests();
        $ageCategory = AgeCategory::all()->first();
        $response    = $this->json(
            'PUT',
            'api/age_category/'.$ageCategory->id,
            [
                'name'          => $ageCategory->name,
                'years'         => ($ageCategory->years - 10),
            ],
            [
                'Authorization' => "Bearer ".(string)($this->token),
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('age_categories', [
            'name'          => $ageCategory->name,
            'years'         => ($ageCategory->years - 10),
        ]);
    }

    /**
     * test destroy
     */
    public function testDestroyStatus()
    {
        $this->setupTests();
        $ageCategory = AgeCategory::all()->first();
        $response = $this->json(
            'DELETE',
            'api/age_category/'.$ageCategory->id,
            [],
            [
                'Authorization' => "Bearer ".(string)($this->token),
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('age_categories', [
            'name'          => $ageCategory->name,
            'years'         => $ageCategory->years,
        ]);
    }

    /**
     * test create wrong age category
     */
    public function testWrongCreateStatus()
    {
        $this->setupTests();
        $ageCategory = factory(AgeCategory::class)->make();
        $response = $this->json(
            'POST',
            'api/age_category',
            [
                'name'          => $ageCategory->name,
                'years'         => $ageCategory->years.' hey',
            ],
            [
                'Authorization' => "Bearer ".(string)($this->token),
            ]
        );
        $response->assertStatus(422);
    }
}
