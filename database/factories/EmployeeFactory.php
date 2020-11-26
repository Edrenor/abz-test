<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use App\Photo;
use App\Position;

$factory->define(Employee::class,
    function (Faker $faker) {
        $position = Position::all()->random();

//        dd(Employee::with('position_id')->firstOrFail());
        return [
            'full_name'       => $faker->firstName . ' ' . $faker->lastName,
            'position_id'     => $position->id,
            'employment_date' => $faker->date(),
            'phone_number'    => $faker->phoneNumber,
            'head_id'         => null,//Employee::with('position_id')->where('level', '>=', $position->level)->firstOrFail(),
            'email'           => $faker->email,
            'salary'          => $faker->numberBetween(2000000, 8000000),
            'photo_id'        => function () {
                return factory(Photo::class)->create()->id;
            },
        ];
    }
);
