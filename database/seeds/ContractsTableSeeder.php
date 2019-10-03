<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractsTableSeeder extends Seeder
{
  public function run()
  {
    // contract types seeder
    $contractTypes = [
      ['id' => 1, 'name' => 'Không xác định thời hạn', 'slug' => 'khong-xac-dinh-thoi-han'],
      ['id' => 2, 'name' => 'Xác định thời hạn', 'slug' => 'xac-dinh-thoi-han'],
      ['id' => 3, 'name' => 'Thử việc', 'slug' => 'thu-viec']
    ];
    DB::table('contract_types')->insert($contractTypes);

    // contracts seeder
    $contracts = [
      [
        'id'                => 1,
        'contract_type_id'  => 3,
        'worker_id'         => 1,
        'user_id'           => 1,
        'code'              => 'HĐLĐ001',
        'salary'            => '10000000',
        'effective_date'    => '2017-1-1',
        'expiry_date'       => null,
        'sign_date'         => '2017-1-1',
        'status'            => 1
      ],
      [
        'id'                => 2,
        'contract_type_id'  => 2,
        'worker_id'         => 2,
        'user_id'           => 1,
        'code'              => 'HĐLĐ002',
        'salary'            => '8000000',
        'effective_date'    => '2019-1-1',
        'expiry_date'       => '2020-1-1',
        'sign_date'         => '2019-1-1',
        'status'            => 0
      ],
      [
        'id'                => 3,
        'contract_type_id'  => 1,
        'worker_id'         => 3,
        'user_id'           => 1,
        'code'              => 'HĐLĐ003',
        'salary'            => '6000000',
        'effective_date'    => '2017-1-1',
        'expiry_date'       => '2017-1-3',
        'sign_date'         => '2017-1-1',
        'status'            => 1
      ]
    ];
    DB::table('contracts')->insert($contracts);
  }
}
