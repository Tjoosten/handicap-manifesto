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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Quotes::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'name' => $faker->name,
        'birth_date' => $faker->date('Y-m-d'),
        'quote' => $faker->sentences(3),
        'publish' => $faker->numberBetween(1, 2)
    ];
});

$factory->define(App\Signatures::class, function (Faker\Generator $faker) {
    return [
        'naam' => $faker->name,
        'geboortedatum' => $faker->date('Y-m-d'),
        'stad' => $faker->city,
        'email' => $faker->email,
        'leeftijd' => $faker->numberBetween(0, 70)
    ];
});

$factory->define(App\Statistics::class, function (Faker\Generator $faker) {
    return [
        'route' => $faker->url,
        'ip_address' => $faker->ipv4,
    ];
});

$factory->define(App\ErrorCategory::class, function (Faker\Generator $faker) {
    return [
        // TODO: Write array
    ];
});

$factory->define(App\Errors::class, function (Faker\Generator $faker) {
    return [
      // TODO: Write array
    ];
});

$factory->define(App\ErrorStatus::class, function (Faker\Generator $faker) {
    return [
        // TODO: Write array
    ];
});
