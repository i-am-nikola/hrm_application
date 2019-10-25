<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
  public function run()
  {
    $departments = [
      ['name' => 'Phòng hành chính nhân sự', 'slug' => 'phong-hanh-chinh-nhan-su'],
      ['name' => 'Phòng tài chính kế toán', 'slug' => 'phong-tai-chinh-ke-toan'],
      ['name' => 'Phòng kinh doanh', 'slug' => 'phong-kinh-doanh'],
      ['name' => 'Phòng kỹ thuật', 'slug' => 'phong-ky-thuat'],
      ['name' => 'Phòng kế hoạch', 'slug' => 'phong-ke-hoach'],
      ['name' => 'Phòng marketing', 'slug' => 'phong-marketing'],
    ];
    DB::table('departments')->insert($departments);
  }
}
