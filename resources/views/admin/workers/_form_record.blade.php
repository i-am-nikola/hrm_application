@php
$record_ids = isset($worker) ? explode(',', $worker->record_ids) : [];
@endphp

<div class="tab-pane" id="record">
  <div class="form-group clearfix row pl-4 pt-2">
    @if (isset($records) && $records->isNotEmpty())
    @foreach ($records as $record)
    @php
    $checked = false;
    if(isset($worker)){
    $checked = in_array($record->id, $record_ids) ? true : false;
    }
    @endphp
    <div class="icheck-primary d-inline col-md-4">
      {!! Form::checkbox('record_ids[]', $record->id, $checked, ['id' => "record_$record->id"]) !!}
      {!! Form::label("record_$record->id", $record->name) !!}
    </div>
    @endforeach
    @endif
  </div>
</div>
