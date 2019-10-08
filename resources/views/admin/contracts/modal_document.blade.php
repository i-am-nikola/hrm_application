<div class="modal fade" id="modal-contract-document">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ t('contract.document') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="contract-content">
        
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ t('action.close') }}</button>
        <button type="button" class="btn btn-primary" id="btn-print-contract"><i class="fas fa-print"></i> {{ t('action.print') }}</button>
      </div>
    </div>
  </div>
</div>
