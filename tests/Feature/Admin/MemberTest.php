<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Member;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;

class MemberTest extends TestCase
{
    /**
     * User Trait
     */
    use UserTrait;

    private $member;

    public function testIndexAction()
    {
        $this->setupTests();
        $response = $this->get('api/inscriptions', [ 'Authorization' => "Bearer ".(string)($this->token) ]);
        $response->assertStatus(200);
    }

    public function testSaveAction()
    {
        $this->setupTests();
        $member = factory(Member::class)->make();
        $response = $this->json(
            'POST',
            'api/inscriptions/save',
            [
                'lastname'      => $member->lastname,
                'firstname'     => $member->firstname,
                'sexe'          => $member->sexe,
                'birthday'      => $member->birthday,
                'address'       => $member->address,
                'postal_code'   => $member->postal_code,
                'city'          => $member->city,
                'phone'         => $member->phone,
                'red_list'      => $member->red_list,
                'mobile'        => $member->mobile,
                'email'         => $member->email,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }

    public function testLoadAction()
    {
        $this->setupTests();
        $member = factory(Member::class)->create();
        $response = $this->json(
            'POST',
            'api/inscriptions/load',
            [
                'lastname'      => $member->lastname,
                'firstname'     => $member->firstname,
            ],
            [ 'Authorization' => "Bearer ".(string)($this->token) ]
        );
        $response->assertStatus(200);
    }
}
