<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [
    'uses'  => 'Auth\RegisterController@register',
]);
Route::post('/signin', [
    'uses'  => 'Auth\LoginController@signin',
]);
Route::get('/user', [
    'uses'  => 'UserController@index'
])->middleware('jwt.auth');

// Categories
Route::resource('category', 'Admin\CategoryController');
// Articles
Route::resource('article', 'Admin\ArticleController');
// Albums
Route::resource('album', 'Admin\AlbumController');
// Pictures
Route::put('picture/add', [ 'uses' => 'Admin\PictureController@store']);
Route::get('picture/{picture}/sync/album/{album}', [ 'uses' => 'Admin\AlbumController@syncPicture' ]);
Route::resource('picture', 'Admin\PictureController');