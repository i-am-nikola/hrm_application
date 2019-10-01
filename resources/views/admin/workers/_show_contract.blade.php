<div class="row">
  <div class="col-12">
    <div class="mb-2">
      <button class=" btn btn-primary" data-toggle="modal" data-target="#modal-create-contract"
        data-url={{ route('contracts.store') }}>
        <i class="fa fa-plus"></i> {{ t('contract.create') }}
      </button>
    </div>
    <div class="dataTables_scroll">
      <table class="table table-bordered table-striped js-contract-table">
        <thead>
          @include('admin.workers._thead_contract')
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
