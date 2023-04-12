<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\model;

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [

            'nama_mitra'=>$faker->name,
            'alamat'=>$faker->address,
            'no_hp'=>$faker->mobilphoneNumber,
            'username'=>$faker->userName,
            'password' => bcrypt('secret'),
    ];
});
