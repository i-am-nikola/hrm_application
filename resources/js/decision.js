$(document).ready(() => {
  // create decision
  $('#js-decision-create').on('submit', e => {
    e.preventDefault();
    let url = $(e.target).attr('action');
    let data = $(e.target).serialize();
    $.ajax({
      type: "POST",
      url: url,
      data: data,
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function (response) {
        if (response.status === 'success') {
          $('#modal-create-decision').modal('hide');
          $('#js-decision-create')[0].reset();
          $('.message-error').remove();
          toastr.success(response.flash_message);
          reloadDecisionData();
        } else {
          $('.message-error').remove();
          showErrorMessage(response.errors);
        }
      }
    });
  })

  // update decision
  $('#js-decision-update').on('submit', e => {
    e.preventDefault();
    let url = $(e.target).attr('action');
    let data = $(e.target).serialize();
    $.ajax({
      method: "PUT",
      url: url,
      data: data,
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function (response) {
        if (response.status === 'success') {
          $('#modal-edit-decision').modal('hide');
          $('#js-decision-update')[0].reset();
          $('.message-error').remove();
          toastr.success(response.flash_message);
          reloadDecisionData();
        } else {
          $('.message-error').remove();
          showErrorMessage(response.errors);
        }
      }
    });
  })

  // delete single decision
  $(document).ready(() => {
    $('#modal-confirm-delete').on('show.bs.modal', e => {
      var url = $(e.relatedTarget).data('url');

      if (url.indexOf('decisions') > -1) {
        $('#confirm-delete').off('click').on('click', e => {
          $.ajax({
            type: 'DELETE',
            url: url,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
            },
            success: data => {
              $('#modal-confirm-delete').modal('hide');
              toastr.success(data.flash_message);
              reloadDecisionData();
            },
          });
        })
      }
    });
  });

  function showErrorMessage(data) {
    $.each(data, (key, value) => {
      let message = '<p class="message-error text-danger mt-1">' + value + '</p>'
      $('.decision-form input[name="' + key + '"]').next().remove();
      $('.decision-form select[name="' + key + '"]').next().remove();
      $('.decision-form input[name="' + key + '"]').after(message);
      $('.decision-form select[name="' + key + '"]').after(message);
    });
  }

  // get data decision ajax
  function reloadDecisionData() {
    $.ajax({
      type: "GET",
      url: $('#decision').data('url'),
      dataType: "html",
      success: function (response) {
        $('#decision').html(response);
      }
    });
  }
  reloadDecisionData();
})

$(document).ready(() => {
  var oldSalaryElemt = $('.decision-form input[name="old_salary"]');
  var newSalaryElemt = $('.decision-form input[name="new_salary"]')
  var formalityElemt = $('.decision-form input[name="formality"]');
  var reasonElemt = $('.decision-form input[name="reason"]');
  var leavingDateElemt = $('.decision-form input[name="leaving_date"]');
  var oldPositionElemt = $('.decision-form input[name="old_position"]');
  var newPositionElemt = $('.decision-form input[name="new_position"]');
  var oldDepartmentElemt = $('.decision-form select[name="old_department"]');
  var newDepartmentElemt = $('.decision-form select[name="new_department"]');
  var decisionTypeIdElemt = $('.decision-form select[name="decision_type_id"]');
  var workerIdElemt = $('#js-decision-create input[name="worker_id"]');
  var selectedValue = $('.decision-form select[name="decision_type_id"] option:selected').val();

  // reset when form is closed
  $('#modal-edit-decision, #modal-create-decision').on('hide.bs.modal', e => {
    $('.decision-form')[0].reset();
    $('.message-error').remove();
  })

  // onChange decision type
  $('.decision-form select[name="decision_type_id"]').on('change', e => {
    let value = $(e.target).val();
    displayElemtCondition(value)
    oldSalaryElemt.val('');
    newSalaryElemt.val('');
    formalityElemt.val('');
    reasonElemt.val('');
    leavingDateElemt.val('');
    oldPositionElemt.val('');
    newPositionElemt.val('');
    oldDepartmentElemt.val(0);
    newDepartmentElemt.val(0);
    $('.message-error').remove();
  })

  // get old_department and old_position fill in create decision form
  $('#modal-create-decision').on('show.bs.modal', e => {
    displayElemtCondition(selectedValue)
    let url = $(e.relatedTarget).data('url');
    let worker_id = workerIdElemt.val();
    $.ajax({
      type: "GET",
      url: url,
      data: { id: worker_id },
      dataType: "json",
      success: function (response) {
        decisionTypeIdElemt.on('change', e => {
          let value = $(e.target).val();
          if (value == 1 || value == 4 || value == 5) {
            oldPositionElemt.val('');
            oldDepartmentElemt.val(0)
          }
          if (value == 2) {
            oldPositionElemt.val(response.position);
            oldDepartmentElemt.val(response.department_id)
          }
          if (value == 3) {
            oldPositionElemt.val(response.position);
            oldDepartmentElemt.val(0);
          }
        })
      }
    });
  })

  // get data edit
  $('#modal-edit-decision').on('show.bs.modal', e => {
    let url = $(e.relatedTarget).data('url');
    $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      success: response => {
        $('.decision-form select[name="decision_type_id"]').attr("style", "pointer-events: none;");
        displayElemtCondition(response.decision_type_id);
        $.each(response, (key, value) => {
          $('.decision-form input[name="' + key + '"]').val(value);
          $('.decision-form select[name="' + key + '"]').val(value);
        });
      }
    });
  })

  function showElemt(elemtOne, elemtTwo) {
    elemtOne.parent('.form-group').css('display', 'block');
    elemtTwo.parent('.form-group').css('display', 'block');
  }

  function hideElemt(elemtOne, elemtTwo) {
    elemtOne.parent('.form-group').css('display', 'none');
    elemtTwo.parent('.form-group').css('display', 'none');
  }

  function displayElemtCondition(value) {
    if (value == 1) {
      showElemt(oldSalaryElemt, newSalaryElemt);
      hideElemt(oldDepartmentElemt, newDepartmentElemt);
      hideElemt(oldPositionElemt, newPositionElemt);
      hideElemt(leavingDateElemt, reasonElemt);
      formalityElemt.parent('.form-group').css('display', 'none');
    }
    if (value == 2) {
      hideElemt(oldSalaryElemt, newSalaryElemt);
      showElemt(oldDepartmentElemt, newDepartmentElemt);
      showElemt(oldPositionElemt, newPositionElemt);
      hideElemt(leavingDateElemt, reasonElemt);
      formalityElemt.parent('.form-group').css('display', 'none');
    }
    if (value == 3) {
      showElemt(oldPositionElemt, newPositionElemt);
      hideElemt(oldSalaryElemt, newSalaryElemt);
      hideElemt(oldDepartmentElemt, newDepartmentElemt);
      hideElemt(leavingDateElemt, reasonElemt);
      formalityElemt.parent('.form-group').css('display', 'none');
    }
    if (value == 4) {
      showElemt(leavingDateElemt, reasonElemt);
      hideElemt(oldPositionElemt, newPositionElemt);
      hideElemt(oldSalaryElemt, newSalaryElemt);
      hideElemt(oldDepartmentElemt, newDepartmentElemt);
      formalityElemt.parent('.form-group').css('display', 'none');
    }
    if (value == 5) {
      showElemt(formalityElemt, reasonElemt);
      hideElemt(oldSalaryElemt, newSalaryElemt);
      hideElemt(oldDepartmentElemt, newDepartmentElemt);
      hideElemt(oldPositionElemt, newPositionElemt);
      leavingDateElemt.parent('.form-group').css('display', 'none');
    }
  }

})
