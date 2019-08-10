<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\CatalogCategory::class, function (Faker $faker) {
    return [
        'ru_title' => 'Русский заголовок' . $faker->numberBetween(1, 100),
        'en_title' => 'Английский заголовок' . $faker->numberBetween(1, 100),
        'uz_title' => 'Узбекский заголовок' . $faker->numberBetween(1, 100),
        'parent_id' => 1,
    ];
});
