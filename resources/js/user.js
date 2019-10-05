// delete single user
$(document).ready(() => {
  $('#modal-confirm-delete').on('show.bs.modal', e => {
    let url = $(e.relatedTarget).data('url');
    $('#confirm-delete').one('click', e => {
      if (url.indexOf('users') > -1) {
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
            }
          }
        });
      }
    })
  });
});

