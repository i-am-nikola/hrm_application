<?php

namespace App\Http\Controllers;

use App\Models\Decision;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Worker;

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
    $decisions = new Decision;
    $input = $decisions->getInputDecision($request);
    if ($request->ajax()) {
      // return response($request->all());
      // if ($validator->fails()) {
      //   return response()->json(['status' => 'fails', 'errors' => $validator->errors()]);
      // }
      $newDecision = $decisions->create($input);
      if ($newDecision) {
        return response()->json($newDecision);
      }
    }
  }
}
