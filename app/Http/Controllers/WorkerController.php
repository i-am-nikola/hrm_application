<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Models\Record;
use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
  public function index(Request $request)
  {
    $breadcrumb = [
      'title'  => t('breadcrumb.worker'),
      'home'   => t('breadcrumb.home'),
      'list'    => t('breadcrumb.list')
    ];
    $departmentId = $request->department_id;
    $staringFrom  = $request->staring_from ? formatDateToYmd($request->staring_from) : '1971-1-1';
    $staringTo    = $request->staring_to ? formatDateToYmd($request->staring_to) : now()->format('Y-m-d');
    $status       = $request->status;

    $workers = new Worker;

    if ($request->filled('staring_from')) {
      $workers = $workers->where('staring_date', '>=', $staringFrom);
    }
    if ($request->filled('staring_to')) {
      $workers = $workers->where('staring_date', '<=', $staringTo);
    }
    if ($request->filled('department_id')) {
      $workers = $workers->where('department_id', $departmentId);
    }
    if ($request->filled('status')) {
      $workers = $workers->where('status', $status);
    }

    $workers = $workers->get();

    return view('admin.workers.index', compact('workers', 'breadcrumb'));
  }

  public function create()
  {
    $breadcrumb = [
      'title' => t('breadcrumb.worker'),
      'home'  => t('breadcrumb.home'),
      'list'  => t('breadcrumb.list'),
      'add'   => t('breadcrumb.add'),
      'route' => route('workers.index')
    ];
    $records = Record::all();
    return view('admin.workers.create', compact('records', 'breadcrumb'));
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
    $breadcrumb = [
      'title' => t('breadcrumb.worker'),
      'home'  => t('breadcrumb.home'),
      'list'  => t('breadcrumb.list'),
      'show'  => t('breadcrumb.show'),
      'route' => route('workers.index')
    ];
    $worker = Worker::findOrFail($id);
    $records = Record::all();
    return view('admin.workers.show', compact('worker', 'records', 'breadcrumb'));
  }

  public function edit($id)
  {
    $breadcrumb = [
      'title' => t('breadcrumb.worker'),
      'home'  => t('breadcrumb.home'),
      'list'  => t('breadcrumb.list'),
      'edit'  => t('breadcrumb.edit'),
      'route' => route('workers.index')
    ];
    $worker = Worker::findOrFail($id);
    $records = Record::all();
    return view('admin.workers.edit', compact('worker', 'records', 'breadcrumb'));
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
      if ($worker->delete()) {
        return response(['id' => $id, 'status' => 'success', 'flash_message' => t('worker.message.delete')]);
      }
    }
  }
}
