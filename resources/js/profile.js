$(document).ready(() => {
  // update profile
  $('#update-profile').on('submit', e => {
    e.preventDefault();
    let url = $(e.target).attr('action');
    let data = $(e.target).serialize();
    $.ajax({
      type: "PUT",
      url: url,
      data: data,
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function (response) {
        if (response.status === 'success') {
          toastr.success(response.flash_message);
          setTimeout(() => {
            location.reload();
          }, 1000);
        } else if (response.status === 'error') {
          $('.message-error').remove();
          showErrorMessage(response.errors);
        } else {
          toastr.warning(response.flash_message);
        }
      }
    });
  })

  //update password
  $('#update-password').on('submit', e => {
    e.preventDefault();
    let url = $(e.target).attr('action');
    let data = $(e.target).serialize();
    $.ajax({
      type: "PUT",
      url: url,
      data: data,
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function (response) {
        $('#update-password')[0].reset();
        if (response.status === 'success') {
          toastr.success(response.flash_message);
          $('.message-error').remove();
        } else if (response.status === 'error') {
          $('.message-error').remove();
          showErrorMessage(response.errors);
        } else if (response.status === 'incorrect') {
          $('.message-error').remove();
          $('#update-password input[name="current_password"]').after('<p class="message-error text-danger mt-1">' + response.error + '</p>')
        } else {
          toastr.warning(response.flash_message);
        }
      }
    });
  })

  // show error message
  function showErrorMessage(data) {
    $.each(data, (key, value) => {
      let message = '<p class="message-error text-danger mt-1">' + value + '</p>'
      $('#update-profile input[name="' + key + '"]').next().remove();
      $('#update-profile input[name="' + key + '"]').after(message);
      $('#update-password input[name="' + key + '"]').next().remove();
      $('#update-password input[name="' + key + '"]').after(message);
    });
  }
})

$(document).ready(() => {
  $('#avatar').on('change', function () {

    if ($(this).val() !== '') {
      uploadAvatar();
    }

  })

  function uploadAvatar() {
    let url = $('#avatar-form').attr('action');
    let formData = new FormData($('#avatar-form')[0]);
    $.ajax({
      type: "POST",
      url: url,
      data: formData,
      dataType: "json",
      contentType: false,
      processData: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function (response) {
        console.log(response);
        if (response.status === 'success') {
          toastr.success(response.flash_message);
          setTimeout(() => {
            location.reload();
          }, 1000);
        } else if (response.status === 'error') {
          let message = '<p class="message-error text-danger mt-1">' + response.errors.avatar + '</p>'
          $('#avatar-form .message-error').remove();
          $('#avatar-form input[name="avatar"]').after(message);

        }
      }
    });
  }
})
