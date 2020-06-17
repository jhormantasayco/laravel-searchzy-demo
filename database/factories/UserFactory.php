<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Usuario;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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

$factory->define(Usuario::class, function (Faker $faker) {
    return [
		'name'              => $faker->name,
		'code'              => $faker->unique()->randomNumber(8, true),
		'phone'             => $faker->phoneNumber,
		'email'             => $faker->unique()->safeEmail,
		'email_verified_at' => now(),
		'password'          => Hash::make('salchipapa'),
		'remember_token'    => Str::random(10),
		'role_id'           => $faker->numberBetween(1, 3),
    ];
});

$factory->define(Post::class,  function (Faker $faker) {
    return [
		'title'       => $faker->sentence($nbWords = 5, $variableNbWords = true) ,
		'description' => $faker->text(140),
		'category_id' => $faker->numberBetween(1, 5),
		//'user_id'     => function(){ factory(Usuario::class)->create()->id; },
    ];
});
