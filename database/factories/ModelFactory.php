<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\Models\User::class, 'admin', function(Faker\Generator $faker) use ($factory) {
    $user = $factory->raw(App\Models\User::class);

    return array_merge($user, ['is_admin' => true]);
});

$factory->defineAs(App\Models\User::class, 'debug', function(Faker\Generator $faker) use ($factory) {
    $user = $factory->raw(App\Models\User::class);

    return array_merge($user, ['is_debug' => true]);
});

$factory->define(App\Models\AgeCategory::class, function(Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'years' => $faker->year,
    ];
});
