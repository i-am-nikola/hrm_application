// delete single worker
$(document).ready(() => {
  $('#modal-confirm-delete').on('show.bs.modal', e => {
    var url = $(e.relatedTarget).data('url');
    if (url.indexOf('workers') > -1) {
      $('#confirm-delete').one('click', e => {
        $.ajax({
          type: 'DELETE',
          url: url,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
          },
          success: data => {
            $('#modal-confirm-delete').modal('hide');
            if (data.status === 'success') {
              $('button[data-id=' + data.id + ']').parents('tr').fadeOut();
              toastr.success(data.flash_message);
            } else {
              toastr.warning(data.flash_message);
            }
          },
        });
      })
    }
  });
});
