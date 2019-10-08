<?php

use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{
  public function run()
  {
    $records = array(
      ['name' => 'Sơ yếu lý lịch', 'slug' => 'so-yeu-ly-lich'],
      ['name' => 'Đơn xin việc', 'slug' => 'don-xin-viec'],
      ['name' => 'Chứng minh nhân dân', 'slug' => 'chung-minh-nhan-dan'],
      ['name' => 'Sổ hộ khẩu', 'slug' => 'so-ho-khau'],
      ['name' => 'Giấy khám sức khỏe', 'slug' => 'giay-kham-suc-khoe'],
      ['name' => 'Bằng cấp, chứng chỉ', 'slug' => 'bang-cap-chung-chi']
    );
    DB::table('records')->insert($records);
  }
}
