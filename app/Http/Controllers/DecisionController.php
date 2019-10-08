<?php

namespace App\Http\Controllers;

use App\Http\Requests\DecisionRequest;
use App\Models\Decision;
use Illuminate\Http\Request;
use App\Models\Worker;
use Illuminate\Support\Facades\Validator;

class DecisionController extends Controller
{
  public function reloadData($id)
  {
    $decisions = Decision::where('worker_id', $id)->orderBy('id', 'desc')->get();
    return view('admin.decisions.reload', compact('decisions'));
  }

  public function create(Request $request)
  {
    $worker = Worker::findOrFail($request->id);
    return response($worker);
  }

  public function store(Request $request)
  {
    $decisionRequest = new DecisionRequest;
    $validator = Validator::make(
      $request->all(),
      $decisionRequest->rules(),
      $decisionRequest->messages(),
      $decisionRequest->attributes()
    );

    if ($request->ajax()) {
      if ($validator->fails()) {
        return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
      } else {
        $decisions = new Decision;
        $input = $decisions->getInputDecision($request);
        if ($decisions->create($input)) {
          $this->updateLeavingDate($request->worker_id, $request->leaving_date);
          return response()->json(['status' => 'success', 'flash_message' => t('decision.message.create')]);
        }
      }
    }
  }

  public function edit($id)
  {
    $decision = Decision::findOrFail($id);
    return response()->json([
      'id'                => $decision->id,
      'worker_id'         => $decision->worker_id,
      'code'              => $decision->code ? $decision->code : '',
      'decision_type_id'  => $decision->decision_type_id,
      'reason'            => $decision->reason ? $decision->reason : '',
      'formality'         => $decision->formality ? $decision->formality : '',
      'old_department'    => $decision->old_department !== null ? $decision->old_department : 0,
      'new_department'    => $decision->new_department !== null ? $decision->new_department : 0,
      'old_position'      => $decision->old_position ? $decision->old_position : '',
      'new_position'      => $decision->new_position ? $decision->new_position : '',
      'old_salary'        => $decision->old_salary ? $decision->old_salary   : '',
      'new_salary'        => $decision->new_salary ? $decision->new_salary : '',
      'effective_date'    => $decision->effective_date ? $decision->effective_date->format('d/m/Y') : '',
      'sign_date'         => $decision->sign_date ? $decision->sign_date->format('d/m/Y') : '',
      'leaving_date'      => $decision->leaving_date ? $decision->leaving_date->format('d/m/Y') : '',
      'status'            => $decision->status ? 1 : 0
    ]);
  }

  public function update(Request $request)
  {
    $decisionRequest = new DecisionRequest;
    $validator = Validator::make(
      $request->all(),
      $decisionRequest->rules(true, $request->id),
      $decisionRequest->messages(),
      $decisionRequest->attributes()
    );

    if ($request->ajax()) {
      if ($validator->fails()) {
        return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
      } else {
        $decision = Decision::findOrFail($request->id);
        $input = $decision->getInputDecision($request);
        if ($decision->update($input)) {
          $this->updateLeavingDate($request->worker_id, $request->leaving_date);
          return response()->json(['status' => 'success', 'flash_message' => t('decision.message.update')]);
        }
      }
    }
  }

  private function updateLeavingDate($workerId, $leavingDate)
  {
    $workers = Worker::findOrFail($workerId);
    $workers->leaving_date = formatDateToYmd($leavingDate);
    $workers->save();
  }

  public function destroy(Request $request, $id)
  {
    $decision = Decision::findOrFail($id);
    if ($request->ajax()) {
      if ($decision->delete()) {
        return response(['id' => $id, 'status' => 'success', 'flash_message' => t('decision.message.delete')]);
      }
    }
  }

  public function document($id)
  {
    $decision = Decision::findOrFail($id);
    return view('admin.decisions.content_document', compact('decision'));
  }
}
