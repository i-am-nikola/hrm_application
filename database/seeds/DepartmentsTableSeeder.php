<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
  public function run()
  {
    $departments = [
      ['id' => 1, 'parent_id' => 0, 'name' => 'Root', 'slug' => 'root'],
      ['id' => 2, 'parent_id' => 1, 'name' => 'Phòng hành chính nhân sự', 'slug' => 'phong-hanh-chinh-nhan-su'],
      ['id' => 3, 'parent_id' => 1, 'name' => 'Phòng tài chính kế toán', 'slug' => 'phong-tai-chinh-ke-toan'],
      ['id' => 4, 'parent_id' => 1, 'name' => 'Phòng kinh doanh', 'slug' => 'phong-kinh-doanh'],
      ['id' => 5, 'parent_id' => 1, 'name' => 'Phòng kỹ thuật', 'slug' => 'phong-ky-thuat'],
    ];
    DB::table('departments')->insert($departments);
  }
}
