<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call([
      UsersTableSeeder::class,
      DepartmentsTableSeeder::class,
      EducationsTableSeeder::class,
      PositionsTableSeeder::class,
      RecordsTableSeeder::class,
      WorkersTableSeeder::class,
      ContractsTableSeeder::class,
      DecisionsTableSeeder::class,
    ]);
  }
}
