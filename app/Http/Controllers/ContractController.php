<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractRequest;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
  public function create(Request $request) {
    if($request->ajax()){
      return response()->json(['status' => 'success']);
    }
  }

  public function store(Request $request)
  {
    $contractRequest = new ContractRequest;
    $validator = Validator::make(
      $request->all(),
      $contractRequest->rules(),
      $contractRequest->messages(),
      $contractRequest->attributes()
    );

    if ($request->ajax()) {
      if ($validator->fails()) {
        return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
      } else {
        $contract = new Contract;
        $input = $contract->getInputContract($request);
        $newContract = $contract->create($input);
        if ($newContract) {
          return response()->json(['status' => 'success', 'flash_message' => t('contract.message.create')]);
        }
      }
    }
  }

  public function edit($id)
  {
    $contract = Contract::findOrFail($id);
    return response()->json([
      'id'                => $contract->id,
      'worker_id'         => $contract->worker_id,
      'code'              => $contract->code ? $contract->code : '',
      'contract_type_id'  => $contract->contract_type_id,
      'salary'            => $contract->salary ? $contract->salary : '',
      'status'            => $contract->status ? 1 : 0,
      'effective_date'    => $contract->effective_date ? $contract->effective_date->format('d/m/Y') : '',
      'expiry_date'       => $contract->expiry_date ? $contract->expiry_date->format('d/m/Y') : '',
      'sign_date'         => $contract->sign_date ? $contract->sign_date->format('d/m/Y') : '',
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

    if ($request->ajax()) {
      if ($validator->fails()) {
        return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
      } else {
        $contract = Contract::findOrFail($request->id);
        $input = $contract->getInputContract($request);
        $updateContract = $contract->update($input);
        if ($updateContract) {
          return response()->json(['status' => 'success', 'flash_message' => t('contract.message.update')]);
        }
      }
    }
  }

  public function destroy(Request $request, $id)
  {
    $contract = Contract::findOrFail($id);
    if ($request->ajax()) {
      if ($contract->delete()) {
        return response(['id' => $id, 'status' => 'success', 'flash_message' => t('contract.message.delete')]);
      }
    }
  }

  // reload after request ajax (post, update) success
  public function reloadData($id)
  {
    $contracts = Contract::where('worker_id', $id)->orderBy('id', 'desc')->get();
    return view('admin.contracts.reload', compact('contracts'));
  }

  public function document($id)
  {
    $contract = Contract::findOrFail($id);
    return view('admin.contracts.content_document', compact('contract'));
  }
}
