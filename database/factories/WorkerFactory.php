<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Department;
use App\Models\Education;
use App\Models\Worker;
use Faker\Generator as Faker;

$factory->define(Worker::class, function (Faker $faker) {
    return [
      'department_id'     => Department::all()->random()->id,
      'education_id'      => Education ::all()->random()->id,
      'record_ids'        => $faker->randomElement(['1,2,3,4,5,6', '1,2,3,5', '2,4,6']),
      'code'              => $faker->unique()->postcode,
      'name'              => $faker->name,
      'birthday'          => $faker->date,
      'gender'            => $faker->randomElement([0, 1]),
      'id_no'             => $faker->unique()->randomNumber(9),
      'issued_on'         => $faker->date,
      'issued_by'         => $faker->country,
      'email'             => $faker->unique()->safeEmail,
      'phone'             => '0' . $faker->unique()->randomNumber(9),
      'permanent_address' => $faker->country,
      'temporary_address' => $faker->country,
      'graduate_school'   => $faker->country,
      'certificate'       => 'Bằng kỹ sư',
      'skill'             => 'Kỹ sư IT',
      'staring_date'      => $faker->dateTimeBetween('-3 years', 'now'),
      'leaving_date'      => $faker->dateTimeBetween('-3 years', 'now'),
      'status'            => $faker->randomElement([-1, 0, 1]),
    ];
});
