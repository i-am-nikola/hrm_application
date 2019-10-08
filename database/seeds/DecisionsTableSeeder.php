<?php

use Illuminate\Database\Seeder;

class DecisionsTableSeeder extends Seeder
{
  public function run()
  {
    // decision types seeder
    $decisionTypes = [
      ['name' => 'Điều chỉnh lương', 'slug' => 'dieu-chinh-luong'],
      ['name' => 'Điều chuyển nhân sự', 'slug' => 'dieu-chuyen-nhan-su'],
      ['name' => 'Bổ nhiệm nhận sự', 'slug' => 'bo-nhiem-nhan-su'],
      ['name' => 'Chấm dứt hợp đồng lao động', 'slug' => 'cham-dut-hop-dong-lao-dong'],
      ['name' => 'Kỷ luật nhân sự', 'slug' => 'ky-luat-nhan-su']
    ];
    DB::table('decision_types')->insert($decisionTypes);

    // decisions seeder
    $decisions = [
      [
        'decision_type_id'  => 1,
        'worker_id'         => 1,
        'user_id'           => 1,
        'code'              => 'QĐ0001',
        'reason'            => '',
        'formality'         => '',
        'old_department'    => null,
        'new_department'    => null,
        'old_position'      => '',
        'new_position'      => '',
        'old_salary'        => '10000000',
        'new_salary'        => '15000000',
        'effective_date'    => '2019-4-2',
        'sign_date'         => '2019-4-2',
        'leaving_date'      => null,
        'status'            => 1
      ],
      [
        'decision_type_id'  => 3,
        'worker_id'         => 1,
        'user_id'           => 1,
        'code'              => 'QĐ0002',
        'reason'            => '',
        'formality'         => '',
        'old_department'    => null,
        'new_department'    => null,
        'old_position'      => 'Trưởng phòng',
        'new_position'      => 'Giám đốc ',
        'old_salary'        => '',
        'new_salary'        => '',
        'effective_date'    => '2018-12-1',
        'sign_date'         => '2018-1-1',
        'leaving_date'      => null,
        'status'            => 0
      ],
      [
        'decision_type_id'  => 4,
        'worker_id'         => 1,
        'user_id'           => 1,
        'code'              => 'QĐ0003',
        'reason'            => 'Theo nguyện vọng',
        'formality'         => '',
        'old_department'    => null,
        'new_department'    => null,
        'old_position'      => '',
        'new_position'      => '',
        'old_salary'        => '',
        'new_salary'        => '',
        'effective_date'    => '2019-1-1',
        'sign_date'         => '2019-1-1',
        'leaving_date'      => '2019-4-9',
        'status'            => 1
      ],
      [
        'decision_type_id'  => 2,
        'worker_id'         => 1,
        'user_id'           => 1,
        'code'              => 'QĐ0004',
        'reason'            => '',
        'formality'         => '',
        'old_department'    => 4,
        'new_department'    => 5,
        'old_position'      => '',
        'new_position'      => '',
        'old_salary'        => '',
        'new_salary'        => '',
        'effective_date'    => '2019-1-1',
        'sign_date'         => '2019-1-1',
        'leaving_date'      => null,
        'status'            => 1
      ],
      [
        'decision_type_id'  => 5,
        'worker_id'         => 1,
        'user_id'           => 1,
        'code'              => 'QĐ0005',
        'reason'            => 'Đi làm trễ',
        'formality'         => 'Phạt 200.000 vnđ',
        'old_department'    => null,
        'new_department'    => null,
        'old_position'      => '',
        'new_position'      => '',
        'old_salary'        => '',
        'new_salary'        => '',
        'effective_date'    => '2019-1-1',
        'sign_date'         => '2019-1-1',
        'leaving_date'      => null,
        'status'            => 1
      ]
    ];
    DB::table('decisions')->insert($decisions);
  }
}
