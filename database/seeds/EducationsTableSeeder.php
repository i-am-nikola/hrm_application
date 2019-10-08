<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationsTableSeeder extends Seeder
{
  public function run()
  {
    $educations = [
      ['name' => 'Trung học', 'slug' => 'trung-hoc'],
      ['name' => 'Trung cấp', 'slug' => 'trung-cap'],
      ['name' => 'Cao đẳng', 'slug' => 'cao-dang'],
      ['name' => 'Đại học', 'slug' => 'dai-hoc'],
      ['name' => 'Trên đại học', 'slug' => 'tren-dai-hoc'],
    ];
    DB::table('educations')->insert($educations);
  }
}
