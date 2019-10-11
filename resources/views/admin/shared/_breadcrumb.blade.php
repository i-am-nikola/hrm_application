@if (isset($breadcrumb) && !empty($breadcrumb))
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ $breadcrumb['title'] }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          @if (isset($breadcrumb['home']))
          <li class="breadcrumb-item"><a href={{ route('dashboard.index') }}>{{ $breadcrumb['home'] }}</a></li>
          @endif
          @if (isset($breadcrumb['list']))
          <li class="breadcrumb-item active">
            @if (isset($breadcrumb['route']))
            <a href={{ $breadcrumb['route'] }}>{{ $breadcrumb['list'] }}</a>
            @else
            {{ $breadcrumb['list'] }}
            @endif
          </li>
          @endif
          @if (isset($breadcrumb['show']))
          <li class="breadcrumb-item active">{{ $breadcrumb['show'] }}</li>
          @endif
          @if (isset($breadcrumb['add']))
          <li class="breadcrumb-item active">{{ $breadcrumb['add'] }}</li>
          @endif
          @if (isset($breadcrumb['edit']))
          <li class="breadcrumb-item active">{{ $breadcrumb['edit'] }}</li>
          @endif
        </ol>
      </div>
    </div>
  </div>
</div>
@else
<div class="pt-3"></div>
@endif
