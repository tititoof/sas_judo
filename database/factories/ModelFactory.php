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


/**
 * Basic user
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'firstname'      => $faker->firstName,
        'lastname'       => $faker->lastname,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'address'        => $faker->streetAddress,
        'phone'          => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});

/**
 * User "admin"
 */
$factory->defineAs(App\Models\User::class, 'admin', function(Faker\Generator $faker) use ($factory) {
    $user = $factory->raw(App\Models\User::class);

    return array_merge($user, ['is_admin' => true]);
});

/**
 * User "debug"
 */
$factory->defineAs(App\Models\User::class, 'debug', function(Faker\Generator $faker) use ($factory) {
    $user = $factory->raw(App\Models\User::class);

    return array_merge($user, ['is_debug' => true]);
});

/**
 * Age category
 */
$factory->define(App\Models\AgeCategory::class, function(Faker\Generator $faker) {
    return [
        'name'  => $faker->name,
        'years' => $faker->year,
    ];
});

/**
 * Seasons
 */
$factory->define(App\Models\Season::class, function(Faker\Generator $faker) {
    $startingDate = $faker->dateTimeThisDecade();
    $endingDate   = new \DateTime();
    $endingDate->setTimestamp(strtotime('+1 year', $startingDate->getTimestamp()));

    return [
        'name'      => $faker->name,
        'start_at'  => $startingDate->format('Y-m-d H:i:s'),
        'end_at'    => $endingDate->format('Y-m-d H:i:s'),
    ];
});


/**
 * Results
 */
$factory->define(App\Models\Result::class, function(Faker\Generator $faker) {
    return [
        'season_id'     => function() {
            return factory(App\Models\Season::class)->create()->id;
        },
        'name'          => $faker->name,
        'locality'      => $faker->city,
        'contest_at'    => $faker->dateTimeThisYear,
        'informations'  => '{}',
    ];
});


/**
 * Pictures
 */
$factory->define(App\Models\Picture::class, function(Faker\Generator $faker) {
    $image = $faker->image('/storage/app/test', 640, 480, 'cats', false);
    return [
        'name'      => $faker->name,
        'filename'  => $image
    ];
});
