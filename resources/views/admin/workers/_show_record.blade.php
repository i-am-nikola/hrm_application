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
    $isRecord = in_array($record->id, $record_ids) ? true : false;
    $fontAwesome = $isRecord ? 'check-circle text-success' : 'times-circle text-danger';
    $textColor = !$isRecord ? 'text-muted' : '';
    }
    @endphp
    <div class="icheck-primary d-inline col-md-6">
      <span class="{{ $textColor }}">
          <i class="far fa-lg fa-{{ $fontAwesome }}"></i>&nbsp; {{ $record->name }}
      </span>
    </div>
    @endforeach
    @endif
  </div>
</div>
