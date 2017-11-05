<?php

use Faker\Generator as Faker;
use App\Post;
use App\Section;

$factory->define(App\Post::class, function (Faker $faker) {


return [
    'title' =>$faker->realText(120),
    'body'=>$faker->realText(1000),
    'section_id'=>section::inRandomOrder()->first()->id,
    ];
})
;