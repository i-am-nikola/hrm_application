/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _common__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./common */ "./resources/js/common.js");
/* harmony import */ var _common__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_common__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _user__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./user */ "./resources/js/user.js");
/* harmony import */ var _user__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_user__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _worker__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./worker */ "./resources/js/worker.js");
/* harmony import */ var _worker__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_worker__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _contract__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./contract */ "./resources/js/contract.js");
/* harmony import */ var _contract__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_contract__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _decision__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./decision */ "./resources/js/decision.js");
/* harmony import */ var _decision__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_decision__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _permission__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./permission */ "./resources/js/permission.js");
/* harmony import */ var _permission__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_permission__WEBPACK_IMPORTED_MODULE_5__);







/***/ }),

/***/ "./resources/js/common.js":
/*!********************************!*\
  !*** ./resources/js/common.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// customize datatable plugin
$(document).ready(function () {
  $('.data-table').DataTable({
    language: {
      lengthMenu: 'Hiển thị _MENU_ bảng ghi/trang',
      zeroRecords: 'Không tìm thấy dữ liệu',
      info: 'Trang hiển thị _PAGE_ / _PAGES_',
      infoEmpty: 'Không có dữ liệu',
      infoFiltered: '(lọc từ _MAX_ bảng ghi)',
      search: 'Tìm kiếm',
      paginate: {
        first: 'Đầu tiên',
        last: 'Cuối cùng',
        next: 'Sau',
        previous: 'Trước'
      }
    }
  });
  $('.data-table').wrap('<div class="dataTables_scroll" />');
}); //customize daterangepicker, format date to dd/mm/yyy

$(document).ready(function () {
  $('.reservation').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    autoUpdateInput: false,
    setDate: "",
    locale: {
      format: 'DD/MM/YYYY'
    }
  });
  $('.reservation').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY'));
  });
  $('.reservation').on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('');
  });
});

/***/ }),

/***/ "./resources/js/contract.js":
/*!**********************************!*\
  !*** ./resources/js/contract.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.js-contract-table').DataTable({
    searching: false,
    bPaginate: false,
    bInfo: false,
    ordering: false
  }); // reset when close from

  $('#modal-edit-contract, #modal-create-contract').on('hide.bs.modal', function (e) {
    $('.decision-form')[0].reset();
    $('.message-error').remove();
  }); // Nếu người dùng chọn Hợp đồng không xác định thời hạn thì ẩn form Ngày hết hiệu lực

  $('.contract-form select[name="contract_type_id"]').on('change', function () {
    var value = $(this).children("option:selected").val();

    if (value == 1) {
      $('.contract-form input[name="expiry_date"]').val('');
      $('.contract-form input[name="expiry_date"]').parent('.form-group').css('display', 'none');
    } else {
      $('.contract-form input[name="expiry_date"]').parent('.form-group').removeAttr('style');
    }
  }); // Request input contract to ContractController@store using ajax

  $('#modal-create-contract').on('show.bs.modal', function (e) {
    $('#js-contract-form')[0].reset();
    var url = $(e.relatedTarget).data('url');
    $(document).on('submit', '#js-contract-form', function (e) {
      var data = $(e.target).serialize();
      e.preventDefault();
      e.stopImmediatePropagation();
      $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "json",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
        },
        success: function success(response) {
          if (response.status === 'success') {
            $('#modal-create-contract').modal('hide');
            $('#js-contract-form')[0].reset();
            $('.message-error').remove();
            toastr.success(response.flash_message);
            reloadData();
          } else {
            $('.message-error').remove();
            showErrorMessage(response.errors);
          }
        }
      });
    });
  }); // Request input contract to ContractController@update using ajax

  $('#js-contract-update').on('submit', function (e) {
    e.preventDefault();
    var url = $(event.target).attr('action');
    var data = $(event.target).serialize();
    $.ajax({
      method: "PUT",
      url: url,
      data: data,
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function success(response) {
        if (response.status === 'success') {
          $('#modal-edit-contract').modal('hide');
          $('#js-contract-update')[0].reset();
          $('.message-error').remove();
          toastr.success(response.flash_message);
          reloadData();
        } else {
          $('.message-error').remove();
          showErrorMessage(response.errors);
        }
      }
    });
  }); // show error message

  function showErrorMessage(data) {
    $.each(data, function (key, value) {
      var message = '<p class="message-error text-danger mt-1">' + value + '</p>';
      $('.contract-form input[name="' + key + '"]').next().remove();
      $('.contract-form select[name="' + key + '"]').next().remove();
      $('.contract-form input[name="' + key + '"]').after(message);
      $('.contract-form select[name="' + key + '"]').after(message);
    });
  } // get data contracts ajax


  function reloadData() {
    $.ajax({
      type: "GET",
      url: $('#contract').data('url'),
      dataType: "html",
      success: function success(response) {
        $('.js-contract-table tbody').html(response);
      }
    });
  }

  reloadData();
}); // delete single contract

$(document).ready(function () {
  $('#modal-confirm-delete').on('show.bs.modal', function (e) {
    var url = $(e.relatedTarget).data('url');

    if (url.indexOf('contracts') > -1) {
      $('#confirm-delete').off('click').on('click', function (e) {
        $.ajax({
          type: 'DELETE',
          url: url,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
          },
          success: function success(data) {
            $('button[data-id=' + data.id + ']').parents('tr').remove();
            $('#modal-confirm-delete').modal('hide');
            toastr.success(data.flash_message);
          }
        });
      });
    }
  });
}); // get data edit

$(document).ready(function () {
  $('#modal-edit-contract').on('show.bs.modal', function (e) {
    $('.contract-form input[name="expiry_date"]').parent('.form-group').removeAttr('style');
    var url = $(e.relatedTarget).data('url');
    $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      success: function success(response) {
        $.each(response, function (key, value) {
          $('#js-contract-update input[name="' + key + '"]').val(value);
          $('#js-contract-update select[name="' + key + '"]').val(value);
        });
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/decision.js":
/*!**********************************!*\
  !*** ./resources/js/decision.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  // create decision
  $('#js-decision-create').on('submit', function (e) {
    e.preventDefault();
    var url = $(e.target).attr('action');
    var data = $(e.target).serialize();
    $.ajax({
      type: "POST",
      url: url,
      data: data,
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function success(response) {
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
  }); // update decision

  $('#js-decision-update').on('submit', function (e) {
    e.preventDefault();
    var url = $(e.target).attr('action');
    var data = $(e.target).serialize();
    $.ajax({
      method: "PUT",
      url: url,
      data: data,
      dataType: "json",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function success(response) {
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
  }); // delete single decision

  $(document).ready(function () {
    $('#modal-confirm-delete').on('show.bs.modal', function (e) {
      var url = $(e.relatedTarget).data('url');

      if (url.indexOf('decisions') > -1) {
        $('#confirm-delete').off('click').on('click', function (e) {
          $.ajax({
            type: 'DELETE',
            url: url,
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
            },
            success: function success(data) {
              $('#modal-confirm-delete').modal('hide');
              toastr.success(data.flash_message);
              reloadDecisionData();
            }
          });
        });
      }
    });
  });

  function showErrorMessage(data) {
    $.each(data, function (key, value) {
      var message = '<p class="message-error text-danger mt-1">' + value + '</p>';
      $('.decision-form input[name="' + key + '"]').next().remove();
      $('.decision-form select[name="' + key + '"]').next().remove();
      $('.decision-form input[name="' + key + '"]').after(message);
      $('.decision-form select[name="' + key + '"]').after(message);
    });
  } // get data decision ajax


  function reloadDecisionData() {
    $.ajax({
      type: "GET",
      url: $('#decision').data('url'),
      dataType: "html",
      success: function success(response) {
        $('#decision').html(response);
      }
    });
  }

  reloadDecisionData();
});
$(document).ready(function () {
  var oldSalaryElemt = $('.decision-form input[name="old_salary"]');
  var newSalaryElemt = $('.decision-form input[name="new_salary"]');
  var formalityElemt = $('.decision-form input[name="formality"]');
  var reasonElemt = $('.decision-form input[name="reason"]');
  var leavingDateElemt = $('.decision-form input[name="leaving_date"]');
  var oldPositionElemt = $('.decision-form input[name="old_position"]');
  var newPositionElemt = $('.decision-form input[name="new_position"]');
  var oldDepartmentElemt = $('.decision-form select[name="old_department"]');
  var newDepartmentElemt = $('.decision-form select[name="new_department"]');
  var decisionTypeIdElemt = $('.decision-form select[name="decision_type_id"]');
  var workerIdElemt = $('#js-decision-create input[name="worker_id"]');
  var selectedValue = $('.decision-form select[name="decision_type_id"] option:selected').val(); // reset when form is closed

  $('#modal-edit-decision, #modal-create-decision').on('hide.bs.modal', function (e) {
    $('.decision-form')[0].reset();
    $('.message-error').remove();
  }); // onChange decision type

  $('.decision-form select[name="decision_type_id"]').on('change', function (e) {
    var value = $(e.target).val();
    displayElemtCondition(value);
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
  }); // get old_department and old_position fill in create decision form

  $('#modal-create-decision').on('show.bs.modal', function (e) {
    displayElemtCondition(selectedValue);
    var url = $(e.relatedTarget).data('url');
    var worker_id = workerIdElemt.val();
    $.ajax({
      type: "GET",
      url: url,
      data: {
        id: worker_id
      },
      dataType: "json",
      success: function success(response) {
        decisionTypeIdElemt.on('change', function (e) {
          var value = $(e.target).val();

          if (value == 1 || value == 4 || value == 5) {
            oldPositionElemt.val('');
            oldDepartmentElemt.val(0);
          }

          if (value == 2) {
            oldPositionElemt.val(response.position);
            oldDepartmentElemt.val(response.department_id);
          }

          if (value == 3) {
            oldPositionElemt.val(response.position);
            oldDepartmentElemt.val(0);
          }
        });
      }
    });
  }); // get data edit

  $('#modal-edit-decision').on('show.bs.modal', function (e) {
    var url = $(e.relatedTarget).data('url');
    $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      success: function success(response) {
        $('.decision-form select[name="decision_type_id"]').attr("style", "pointer-events: none;");
        displayElemtCondition(response.decision_type_id);
        $.each(response, function (key, value) {
          $('.decision-form input[name="' + key + '"]').val(value);
          $('.decision-form select[name="' + key + '"]').val(value);
        });
      }
    });
  });

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
});

/***/ }),

/***/ "./resources/js/permission.js":
/*!************************************!*\
  !*** ./resources/js/permission.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.js-switch-role-permisison input').on('change', function (e) {
    var role_id = $(e.target).val();
    var checked = $(e.target).prop('checked');
    var url = $(e.target).data('url');
    $.ajax({
      type: 'POST',
      url: url,
      data: {
        role_id: role_id,
        checked: checked
      },
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
      },
      success: function success(response) {
        toastr.success(response.flash_message);
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/user.js":
/*!******************************!*\
  !*** ./resources/js/user.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

// delete single user
$(document).ready(function () {
  $('#modal-confirm-delete').on('show.bs.modal', function (e) {
    var url = $(e.relatedTarget).data('url');
    $('#confirm-delete').on('click', function () {
      if (window.location.href.indexOf('users') > -1) {
        $.ajax({
          type: 'DELETE',
          url: url,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
          },
          success: function success(data) {
            $('button[data-id=' + data.id + ']').parents('tr').fadeOut();
            $('#modal-confirm-delete').modal('hide');
            toastr.success(data.flash_message);
          }
        });
      }
    });
  });
});

/***/ }),

/***/ "./resources/js/worker.js":
/*!********************************!*\
  !*** ./resources/js/worker.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// delete single worker
$(document).ready(function () {
  $('#modal-confirm-delete').on('show.bs.modal', function (e) {
    var url = $(e.relatedTarget).data('url');

    if (url.indexOf('workers') > -1) {
      $('#confirm-delete').on('click', function (e) {
        $.ajax({
          type: 'DELETE',
          url: url,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"').attr('content')
          },
          success: function success(data) {
            $('button[data-id=' + data.id + ']').parents('tr').fadeOut();
            $('#modal-confirm-delete').modal('hide');
            toastr.success(data.flash_message);
          }
        });
      });
    }
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /media/hongdung6992/Data/hrm_application/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /media/hongdung6992/Data/hrm_application/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });