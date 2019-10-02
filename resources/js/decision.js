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
        console.log(response);

      }
    });


  })


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

// get old_department, old_position fill in form create decision
$(document).ready(() => {

  let oldPositionElemt = $('.decision-form input[name="old_position"]');
  let oldDepartmentElemt = $('.decision-form select[name="old_department"]');
  let decisionTypeIdElemt = $('.decision-form select[name="decision_type_id"]');
  let workerIdElemt = $('#js-decision-create input[name="worker_id"]');

  $('#modal-create-decision').on('show.bs.modal', e => {
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
            oldDepartmentElemt.val(1)
          }
          if (value == 2) {
            oldPositionElemt.val(response.position);
            oldDepartmentElemt.val(response.department_id)
          }
          if (value == 3) {
            oldPositionElemt.val(response.position);
            oldDepartmentElemt.val(1);
          }
        })
      }
    });
  })
})

//  hide and show input forms when changing decision type
$(document).ready(() => {
  var oldPositionElemt = $('.decision-form input[name="old_position"]');
  var newPositionElemt = $('.decision-form input[name="new_position"]');
  var oldSalaryElemt = $('.decision-form input[name="old_salary"]');
  var newSalaryElemt = $('.decision-form input[name="new_salary"]')
  var formalityElemt = $('.decision-form input[name="formality"]');
  var reasonElemt = $('.decision-form input[name="reason"]');
  var leavingDateElemt = $('.decision-form input[name="leaving_date"]');
  var oldDepartmentElemt = $('.decision-form select[name="old_department"]');
  var newDepartmentElemt = $('.decision-form select[name="new_department"]');
  var selectedValue = $('.decision-form select[name="decision_type_id"] option:selected').val();

  $('.change-form').css('display', 'none');

  if (selectedValue == 1) {
    showElemt(oldSalaryElemt, newSalaryElemt);
    oldPositionElemt.val('');
    oldDepartmentElemt.val(1)
  }

  $('.decision-form select[name="decision_type_id"]').on('change', e => {
    let value = $(e.target).val();
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
  })

  function showElemt(elemtOne, elemtTwo) {
    elemtOne.parent('.form-group').css('display', 'block');
    elemtTwo.parent('.form-group').css('display', 'block');
  }

  function hideElemt(elemtOne, elemtTwo) {
    elemtOne.parent('.form-group').css('display', 'none');
    elemtTwo.parent('.form-group').css('display', 'none');
  }

})
