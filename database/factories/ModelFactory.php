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
    $image = $faker->image('storage/app/test', 640, 480);
    return [
        'name'      => $faker->name,
        'filename'  => $image
    ];
});

/**
 * 
 * 
 */
$factory->define(App\Models\Member::class, function(Faker\Generator $faker) {
    return [
        'lastname'      => $faker->firstName,
        'firstname'     => $faker->lastName,
        'sexe'          => 'Masculin',
        'birthday'      => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
        'address'       => $faker->streetAddress,
        'postal_code'   => $faker->postcode,
        'city'          => $faker->city,
        'phone'         => $faker->phoneNumber,
        'red_list'      => true,
        'mobile'        => $faker->phoneNumber,
        'email'         => $faker->safeEmail,
    ];
});

$factory->define(App\Models\Inscription::class, function(Faker\Generator $faker) {
    return [
        'complementary_insurance'   => $faker->boolean,
        'minor_go_alone'            => $faker->boolean,
        'major_take_off'            => $faker->boolean,
        'season_id'     => function() {
            return factory(App\Models\Season::class)->create()->id;
        },
    ];
});

$factory->define(App\Models\Judoevent::class, function(Faker\Generator $faker) {
    $dateEvent          = $faker->dateTimeThisCentury;
    $dateEventStartAt   = $dateEvent;
    $dateEventEndAt     = $dateEvent->modify('+1 hour');
    return [
        'name'          => $faker->name,
        'type'          => 'tournament',
        'description'   => $faker->text,
        'start_at'      => $dateEventStartAt, //->format('Y-m-d H:i:s'),
        'end_at'        => $dateEventEndAt, //->format('Y-m-d H:i:s'),
        // 'end_time_at'   => $dateEventEndAt->format('H:i:s'),
        // 'start_time_at' => $dateEventStartAt->format('H:i:s'),
    ];
});

$factory->define(App\Models\Course::class, function(Faker\Generator $faker) {
    $dateCourse          = $faker->dateTimeThisCentury;
    $dateCourseStartAt   = $dateCourse;
    $dateCourseEndAt     = $dateCourse->modify('+1 hour');
    return [
        'name'          => $faker->name,
        'season_id'     => function() {
            return factory(App\Models\Season::class)->create()->id;
        },
        'day'           => 'Lundi',
        'start_at'      => $dateCourseStartAt->format('H:i:s'),
        'end_at'        => $dateCourseEndAt->format('H:i:s'),
        'teacher_id'    => function() {
            return factory(App\Models\User::class)->create()->id;
        },
    ];
});