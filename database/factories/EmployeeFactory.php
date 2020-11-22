<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use App\Photo;
use App\Position;

$factory->define(Employee::class,
    function (Faker $faker) {
        $positions = Position::pluck('id')->toArray();
        return [
            'full_name'       => $faker->firstName . ' ' . $faker->lastName,
            'position_id'     => $positions[array_rand($positions)],
            'employment_date' => $faker->date(),
            'phone_number'    => $faker->phoneNumber,
            'email'           => $faker->email,
            'salary'          => $faker->numberBetween(2000000, 8000000),
            'photo_id'        => function () {
                return factory(Photo::class)->create()->id;
            },
        ];
    }
);
