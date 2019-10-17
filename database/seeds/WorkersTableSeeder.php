<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkersTableSeeder extends Seeder
{
  public function run()
  {
    $LeThanhHung = [
      'user_id'           => 1,
      'department_id'     => 2,
      'education_id'      => 4,
      'record_ids'        => '1,2,3,4,5,6',
      'code'              => 'KT0001',
      'name'              => 'Lê Thanh Hưng',
      'birthday'          => '1992-1-1',
      'gender'            => 1,
      'id_no'             => '201613589',
      'issued_on'         => '2010-1-1',
      'issued_by'         => 'CA Đà Nẵng',
      'email'             => 'thanhhung@gmail.com',
      'phone'             => '0905123456',
      'permanent_address' => '94 Ngũ Hành Sơn, Sơn Trà, Đà Nẵng',
      'temporary_address' => '94 Ngũ Hành Sơn, Sơn Trà, Đà Nẵng',
      'graduate_school'   => 'Đại học bách khoa Đà Nẵng',
      'certificate'       => 'Bằng kỹ sư',
      'skill'             => 'Kỹ sư công nghệ thông tin',
      'staring_date'      => '2018-1-1',
      'leaving_date'      => null,
      'status'            => 1
    ];

    $TranKimAnh = [
      'user_id'           => 2,
      'department_id'     => 1,
      'education_id'      => 3,
      'record_ids'        => '1,3,4,6',
      'code'              => 'HCNS0001',
      'name'              => 'Trần Kim Ánh',
      'birthday'          => '1996-1-1',
      'gender'            => 0,
      'id_no'             => '201625459',
      'issued_on'         => '2012-1-1',
      'issued_by'         => 'CA Đà Nẵng',
      'email'             => 'kimanh@gmail.com',
      'phone'             => '0905987456',
      'permanent_address' => '90 Điện Biên Phủ, Thanh Khê, Đà Nẵng',
      'temporary_address' => '90 Điện Biên Phủ, Thanh Khê, Đà Nẵng',
      'graduate_school'   => 'Cao đẳng văn hóa du lịch Đà Nẵng',
      'certificate'       => 'Bằng cử nhân',
      'skill'             => 'Lễ tân',
      'staring_date'      => '2019-1-1',
      'leaving_date'      => null,
      'status'            => 0
    ];

    $LeTuBinh = [
      'user_id'           => 2,
      'department_id'     => 4,
      'education_id'      => 4,
      'record_ids'        => '1,4,6',
      'code'              => 'KD0001',
      'name'              => 'Lê Tự Bình',
      'birthday'          => '1994-1-1',
      'gender'            => 1,
      'id_no'             => '201624756',
      'issued_on'         => '2014-1-1',
      'issued_by'         => 'CA Quảng Nam',
      'email'             => 'tubinh@gmail.com',
      'phone'             => '0905456123',
      'permanent_address' => 'Đại Hiệp, Đại Lộc, Quảng Nam',
      'temporary_address' => '20 Tôn Đức Thắng, Liên Chiểu, Đà Nẵng',
      'graduate_school'   => 'Đại học kinh tế',
      'certificate'       => 'Bằng cử nhân',
      'skill'             => 'Quản trị kinh doanh',
      'staring_date'      => '2017-1-1',
      'leaving_date'      => '2019-1-1',
      'status'            => -1
    ];

    DB::table('workers')->insert([
      $LeThanhHung,
      $TranKimAnh,
      $LeTuBinh
    ]);
  }
}
