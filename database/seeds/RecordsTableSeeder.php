<?php

use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{
  public function run()
  {
    $records = array(
      ['id' => 1, 'name' => 'Sơ yếu lý lịch', 'slug' => 'so-yeu-ly-lich'],
      ['id' => 2, 'name' => 'Đơn xin việc', 'slug' => 'don-xin-viec'],
      ['id' => 3, 'name' => 'Chứng minh nhân dân', 'slug' => 'chung-minh-nhan-dan'],
      ['id' => 4, 'name' => 'Sổ hộ khẩu', 'slug' => 'so-ho-khau'],
      ['id' => 5, 'name' => 'Giấy khám sức khỏe', 'slug' => 'giay-kham-suc-khoe'],
      ['id' => 6, 'name' => 'Bằng cấp, chứng chỉ', 'slug' => 'bang-cap-chung-chi']
    );
    DB::table('records')->insert($records);
  }
}
