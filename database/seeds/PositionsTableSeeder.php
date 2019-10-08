<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
  public function run()
  {
    $positions = [
      ['name' => 'Tổng giám đốc', 'slug' => 'tong-giam-doc'],
      ['name' => 'Phó tổng giám đốc', 'slug' => 'pho-tong-giam-doc'],
      ['name' => 'Giám đốc', 'slug' => 'giam-doc'],
      ['name' => 'Phó giám đốc', 'slug' => 'pho-giam-doc'],
      ['name' => 'Trưởng phòng', 'slug' => 'truong-phong'],
      ['name' => 'Nhân viên', 'slug' => 'nhan-vien'],
    ];
    DB::table('positions')->insert($positions);
  }
}
