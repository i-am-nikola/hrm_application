
// delete single role
$(document).ready(() => {
  $('#modal-confirm-delete').on('show.bs.modal', e => {
    let url = $(e.relatedTarget).data('url');
    $('#confirm-delete').one('click', () => {
      if (url.indexOf('roles') > -1) {
        $.ajax({
          type: 'DELETE',
          url: url,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
          },
          success: data => {
            $('button[data-id=' + data.id + ']').parents('tr').fadeOut();
            $('#modal-confirm-delete').modal('hide');
            toastr.success(data.flash_message);
          }
        });
      }
    })
  });
});
