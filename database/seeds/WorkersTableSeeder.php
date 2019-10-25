<?php

use App\Models\Worker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkersTableSeeder extends Seeder
{
  public function run()
  {
    factory(Worker::class, 100)->create();
  }
}
