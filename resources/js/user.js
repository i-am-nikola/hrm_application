$(document).ready(() => {
  $('#modal-confirm-delete').on('show.bs.modal', e => {
    var id = $(e.relatedTarget).data('id');
    var url = $(e.relatedTarget).data('url');
    $('#confirm-delete').on('click', () => {
      $.ajax({
        type: 'DELETE',
        url: url,
        data: { id },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content') },
        success: data => {
          $('button[data-id=' + data.id + ']').parents('tr').fadeOut();
          $('#modal-confirm-delete').modal('hide');
          toastr.success('Xóa người dùng thành công');
        },
      });
    })
  });
});
