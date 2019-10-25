$(document).ready(() => {
  $('.js-switch-role-permisison input').on('change', e => {
    let role_id = $(e.target).val();
    let checked = $(e.target).prop('checked');
    let url = $(e.target).data('url');
    $.ajax({
      type: 'POST',
      url: url,
      data: { role_id, checked },
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function (response) {
        if(response.status === 'fails'){
          toastr.warning(response.flash_message);
        }else{
          toastr.success(response.flash_message);
        }
      }
    });

  })
})
