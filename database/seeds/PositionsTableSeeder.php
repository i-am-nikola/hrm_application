<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
  public function run()
  {
    $positions = [
      ['id' => 1, 'name' => 'Tổng giám đốc', 'slug' => 'tong-giam-doc'],
      ['id' => 2, 'name' => 'Phó tổng giám đốc', 'slug' => 'pho-tong-giam-doc'],
      ['id' => 3, 'name' => 'Giám đốc', 'slug' => 'giam-doc'],
      ['id' => 4, 'name' => 'Phó giám đốc', 'slug' => 'pho-giam-doc'],
      ['id' => 5, 'name' => 'Trưởng phòng', 'slug' => 'truong-phong'],
      ['id' => 6, 'name' => 'Nhân viên', 'slug' => 'nhan-vien'],
    ];
    DB::table('positions')->insert($positions);
  }
}
