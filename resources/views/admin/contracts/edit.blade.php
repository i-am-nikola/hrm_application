@php
$contractTypes = isset($contractTypes) ? $contractTypes : [];
@endphp

<div class="modal fade" id="modal-edit-contract">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      {!! Form::open(['route' => 'contracts.update', 'method' => 'PUT', 'id' => 'js-contract-update', 'class' => 'contract-form']) !!}
      {!! Form::hidden('id') !!}
      {!! Form::hidden('user_id', (Auth::user()) ? Auth::user()->id : '') !!}
      {!! Form::hidden('worker_id', isset($worker) ? $worker->id : '') !!}
      <div class="modal-header">
        <h4 class="modal-title">{{ t('contract.update') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @include('admin.contracts._form')

      {!! Form::close() !!}
    </div>
  </div>
</div>
