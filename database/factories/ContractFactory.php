<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Worker;
use App\User;
use Faker\Generator as Faker;

$factory->define(Contract::class, function (Faker $faker) {
  return [
    'contract_type_id' => ContractType::all()->random()->id,
    'worker_id'        => Worker::all()->random()->id,
    'user_id'          => User::all()->random()->id,
    'code'             => $faker->unique()->postcode,
    'salary'           => '10000000',
    'effective_date'   => $faker->dateTimeBetween('-3 years', 'now'),
    'expiry_date'      => $faker->dateTimeBetween('-3 years', 'now'),
    'sign_date'        => $faker->dateTimeBetween('-3 years', 'now'),
    'status'           => $faker->randomElement([0, 1])
  ];
});
