<?php

use App\Models\Contract;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractsTableSeeder extends Seeder
{
  public function run()
  {
    // contract types seeder
    $contractTypes = [
      ['name' => 'Không xác định thời hạn', 'slug' => 'khong-xac-dinh-thoi-han'],
      ['name' => 'Xác định thời hạn', 'slug' => 'xac-dinh-thoi-han'],
      ['name' => 'Thử việc', 'slug' => 'thu-viec']
    ];
    DB::table('contract_types')->insert($contractTypes);

    factory(Contract::class, 150)->create();
  }
}
