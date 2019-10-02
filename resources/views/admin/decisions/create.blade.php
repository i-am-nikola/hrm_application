<div class="modal fade" id="modal-create-decision">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      {!! Form::open(['route' => 'decisions.store', 'id' => 'js-decision-create', 'class' => 'decision-form']) !!}
      {!! Form::hidden('user_id', (Auth::user()) ? Auth::user()->id : '') !!}
      {!! Form::hidden('worker_id', isset($worker) ? $worker->id : '') !!}
      <div class="modal-header">
        <h4 class="modal-title">{{ t('decision.create') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      @include('admin.decisions._form')

      {!! Form::close() !!}
    </div>
  </div>
</div>
