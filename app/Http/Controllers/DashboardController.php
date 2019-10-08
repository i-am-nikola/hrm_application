<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractType;
use App\Models\Decision;
use App\Models\DecisionType;
use App\Models\Worker;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $contractTypes = ContractType::all();
    $decisionTypes = DecisionType::all();
    return view('admin.dashboard.index', compact(
      'contractTypes',
      'decisionTypes'
    ));
  }

  public function dashboard(Request $request)
  {
    $year           = $request->year;
    $month          = $request->month;
    $countStaring   = $this->countWorkersStaringByMonth($year);
    $countLeaving   = $this->countWorkersLeavingByMonth($year);
    $countContracts = $this->countContracts($month, $year);
    $countDecisions = $this->countDecisions($month, $year);

    return response()->json([
      'countStaring'   => $countStaring,
      'countLeaving'   => $countLeaving,
      'countContracts' => $countContracts,
      'countDecisions' => $countDecisions
    ]);
  }

  private function countDecisions($month, $year)
  {
    $decisionTypes = DecisionType::all();
    foreach ($decisionTypes as $decisionType) {
      if ($month) {
        $count[$decisionType->id] = Decision::where('decision_type_id', $decisionType->id)
          ->whereYear('sign_date', $year)->whereMonth('sign_date', $month)->count();
      } else {
        $count[$decisionType->id] = Decision::where('decision_type_id', $decisionType->id)
          ->whereYear('sign_date', $year)->count();
      }
    }
    return $count;
  }

  private function countContracts($month, $year)
  {
    $contractTypes = ContractType::all();
    foreach ($contractTypes as $contractType) {
      if ($month) {
        $count[$contractType->id] = Contract::where('contract_type_id', $contractType->id)
          ->whereYear('sign_date', $year)->whereMonth('sign_date', $month)->count();
      } else {
        $count[$contractType->id] = Contract::where('contract_type_id', $contractType->id)
          ->whereYear('sign_date', $year)->count();
      }
    }
    return $count;
  }


  private function countWorkersLeavingByMonth($year)
  {
    for ($i = 1; $i <= 12; $i++) {
      $countLeaving[] = $this->countWorkersByMonth($i, $year, 'leaving_date');
    }
    return $countLeaving;
  }

  private function countWorkersStaringByMonth($year)
  {
    for ($i = 1; $i <= 12; $i++) {
      $countStaring[] = $this->countWorkersByMonth($i, $year);
    }
    return $countStaring;
  }

  private function countWorkersByMonth($month, $year, $type = 'staring_date')
  {
    $count = 0;
    if ($month && $year) {
      $count = Worker::whereYear($type, $year)->whereMonth($type, $month)->count();
    }
    return $count;
  }
}
