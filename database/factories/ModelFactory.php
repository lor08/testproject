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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Post::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->sentence,
		'preview' => $faker->text(100),
		'detail' => $faker->realText(),
	];
});
$factory->define(App\Comment::class, function (Faker\Generator $faker) {
	$posts = App\Post::all()->pluck("id")->toArray();
	return [
		'author' => $faker->name,
		'content' => $faker->text,
		'post_id' => $faker->randomElement($posts),
	];
});