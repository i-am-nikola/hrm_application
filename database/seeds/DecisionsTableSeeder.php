<?php

use Illuminate\Database\Seeder;

class DecisionsTableSeeder extends Seeder
{
  public function run()
  {
    // decision types seeder
    $decisionTypes = [
      ['id' => 1, 'name' => 'Điều chỉnh lương', 'slug' => 'dieu-chinh-luong'],
      ['id' => 2, 'name' => 'Điều chuyển nhân sự', 'slug' => 'dieu-chuyen-nhan-su'],
      ['id' => 3, 'name' => 'Bổ nhiệm', 'slug' => 'bo-nhiem'],
      ['id' => 4, 'name' => 'Chấm dứt hợp đồng lao động', 'slug' => 'cham-dut-hop-dong-lao-dong']
    ];
    DB::table('decision_types')->insert($decisionTypes);

    // decisions seeder
    $decisions = [
      [
        'id'                => 1,
        'decision_type_id'  => 1,
        'worker_id'         => 1,
        'user_id'           => 1,
        'code'              => 'QĐ0001',
        'reason'            => '',
        'old_department'    => null,
        'new_department'    => null,
        'old_position'      => null,
        'new_position'      => null,
        'old_salary'        => '10000000',
        'new_salary'        => '15000000',
        'effective_date'    => '2019-4-2',
        'sign_date'         => '2019-4-2',
        'status'            => 1
      ],
      [
        'id'                => 2,
        'decision_type_id'  => 3,
        'worker_id'         => 2,
        'user_id'           => 1,
        'code'              => 'QĐ0002',
        'reason'            => '',
        'old_department'    => null,
        'new_department'    => null,
        'old_position'      => 6,
        'new_position'      => 5,
        'old_salary'        => '',
        'new_salary'        => '',
        'effective_date'    => '2018-12-1',
        'sign_date'         => '2018-12-1',
        'status'            => 0
      ],
      [
        'id'                => 3,
        'decision_type_id'  => 4,
        'worker_id'         => 3,
        'user_id'           => 1,
        'code'              => 'QĐ0003',
        'reason'            => 'Theo nguyện vọng',
        'old_department'    => null,
        'new_department'    => null,
        'old_position'      => null,
        'new_position'      => null,
        'old_salary'        => '',
        'new_salary'        => '',
        'effective_date'    => '2019-1-1',
        'sign_date'         => '2019-1-1',
        'status'            => 1
      ]
    ];
    DB::table('decisions')->insert($decisions);
  }
}
