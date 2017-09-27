<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Article;
use App\Models\Album;
use App\Models\Category;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\Feature\Admin\UserTrait;

class ArticleTest extends TestCase
{
    /**
     * User Trait
     */
    use UserTrait;
}
