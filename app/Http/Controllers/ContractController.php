<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Models\Contract;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
  public function store(Request $request)
  {
    $contractRequest = new ContractRequest;
    $validator = Validator::make(
      $request->all(),
      $contractRequest->rules(),
      $contractRequest->messages(),
      $contractRequest->attributes()
    );

    $contract = new Contract;
    $input = $contract->getInputContract($request);

    if ($request->ajax()) {
      if ($validator->fails()) {
        return response()->json(['status' => 'fails', 'errors' => $validator->errors()]);
      }
      $newContract = $contract->create($input);
      if ($newContract) {
        return response()->json(['status' => 'success', 'flash_message' => t('contract.message.create')]);
      }
    }
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    $contract = Contract::findOrFail($id);
    return response()->json([
      'id'                => $contract->id !== null ? $contract->id : 1,
      'user_id'           => $contract->user_id !== null ? $contract->user_id : 1,
      'worker_id'         => $contract->worker_id !== null ? $contract->worker_id : 1,
      'code'              => $contract->code !== null ? $contract->code : '',
      'contract_type_id'  => $contract->contract_type_id !== null ? $contract->contract_type_id : 0,
      'salary'            => $contract->salary !== null ? $contract->salary : '',
      'status'            => $contract->status ? $contract->status : 0,
      'effective_date'    => $contract->effective_date !== null ? $contract->effective_date->format('d/m/Y') : '',
      'expiry_date'       => $contract->expiry_date !== null ? $contract->expiry_date->format('d/m/Y') : '',
      'sign_date'         => $contract->sign_date !== null ? $contract->sign_date->format('d/m/Y') : '',
    ]);
  }

  public function update(Request $request)
  {
    $contractRequest = new ContractRequest;
    $validator = Validator::make(
      $request->all(),
      $contractRequest->rules(true, $request->id),
      $contractRequest->messages(),
      $contractRequest->attributes()
    );

    $contract = Contract::findOrFail($request->id);
    $input = $contract->getInputContract($request);
    if ($request->ajax()) {
      if ($validator->fails()) {
        return response()->json(['status' => 'fails', 'errors' => $validator->errors()]);
      }
      $updateContract = $contract->update($input);
      if ($updateContract) {
        return response()->json(['status' => 'success', 'flash_message' => t('contract.message.update')]);
      }
    }
  }

  public function destroy(Request $request, $id)
  {
    $contract = Contract::findOrFail($id);
    if ($request->ajax()) {
      $contract->delete();
      return response(['id' => $id, 'flash_message' => t('contract.message.delete')]);
    }
  }

  // reload after request ajax (post, update) success
  public function reloadData($id)
  {
    $worker = Worker::findOrFail($id);
    $contracts = Contract::where('worker_id', $id)->orderBy('id', 'desc')->get();
    return view('admin.contracts.reload', compact('contracts'));
  }
}
