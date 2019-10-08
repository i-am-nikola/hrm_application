<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
  public function run()
  {
    $departments = [
      ['parent_id' => 0, 'name' => 'Trực thuộc công ty', 'slug' => 'truc-thuoc-cong-ty'],
      ['parent_id' => 1, 'name' => 'Phòng hành chính nhân sự', 'slug' => 'phong-hanh-chinh-nhan-su'],
      ['parent_id' => 1, 'name' => 'Phòng tài chính kế toán', 'slug' => 'phong-tai-chinh-ke-toan'],
      ['parent_id' => 1, 'name' => 'Phòng kinh doanh', 'slug' => 'phong-kinh-doanh'],
      ['parent_id' => 1, 'name' => 'Phòng kỹ thuật', 'slug' => 'phong-ky-thuat'],
    ];
    DB::table('departments')->insert($departments);
  }
}
