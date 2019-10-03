<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Models\Record;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
  public function index()
  {
    $workers = Worker::orderBy('id', 'desc')->get();
    return view('admin.workers.index', compact('workers'));
  }

  public function create()
  {
    $records = Record::all();
    return view('admin.workers.create', compact('records'));
  }

  public function store(WorkerRequest $request)
  {
    $workers = new Worker;
    $input = $workers->getInputWorker($request);
    if ($workers->create($input)) {
      return redirect()->route('workers.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('worker.message.create')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('worker.message.error')]);
    }
  }

  public function show($id)
  {
    $worker = Worker::findOrFail($id);
    $records = Record::all();
    return view('admin.workers.show', compact('worker', 'records', 'contractTypes'));
  }

  public function edit($id)
  {
    $worker = Worker::findOrFail($id);
    $records = Record::all();
    return view('admin.workers.edit', compact('worker', 'records'));
  }

  public function update(Request $request, $id)
  {
    $workerRequest = new WorkerRequest;
    $this->validate(
      $request,
      $workerRequest->rules(true, $id),
      $workerRequest->messages(),
      $workerRequest->attributes()
    );

    $worker = Worker::findOrFail($id);
    $input = $worker->getInputWorker($request);
    if ($worker->update($input)) {
      return redirect()->route('workers.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('worker.message.update')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('worker.message.error')]);
    }
  }

  public function destroy(Request $request, $id)
  {
    if ($request->ajax()) {
      $worker = Worker::findOrFail($id);
      $worker->delete();
      return response(['id' => $id, 'flash_message' => t('worker.message.delete')]);
    }
  }
}
