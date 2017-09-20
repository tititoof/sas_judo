<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicUser()
    {
        // Given collection
        $user = factory(User::class)->create();

        // Then
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    public function testAdminUser()
    {
        $user = factory(User::class, 'admin')->create();

        $this->assertDatabaseHas('users', ['id' => $user->id, 'is_admin' => $user->is_admin]);
    }

    public function testDebugUser()
    {
        $user = factory(User::class, 'debug')->create();

        $this->assertDatabaseHas('users', ['id' => $user->id, 'is_debug' => $user->is_debug]);
    }
}
