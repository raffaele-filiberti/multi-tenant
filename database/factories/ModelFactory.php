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
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret',
        'remember_token' => str_random(10),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'cell_phone' => $faker->phoneNumber,
        'fax' => $faker->tollFreePhoneNumber,
        'address' => $faker->streetAddress,
        'postcode' => $faker->postcode,
        'province' => $faker->stateAbbr,
        'city' => $faker->city,
        'nation' => $faker->country,
        'subscribed' => true
    ];
});

$factory->define(App\Agency::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'motto' => $faker->bs,
        'description' => $faker->catchPhrase
    ];
});

$factory->define(App\customer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
    ];
});
