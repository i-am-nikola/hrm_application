// customize datatable
$(document).ready(() => {
  $(".data-table").DataTable({
    "language": {
      "lengthMenu": "Hiển thị _MENU_ bảng ghi/trang",
      "zeroRecords": "Không tìm thấy dữ liệu",
      "info": "Trang hiển thị _PAGE_ / _PAGES_",
      "infoEmpty": "Không có dữ liệu",
      "infoFiltered": "(lọc từ _MAX_ bảng ghi)",
      "search": "Tìm kiếm",
      "paginate": {
        "first": "Đầu tiên",
        "last": "Cuối cùng",
        "next": "Sau",
        "previous": "Trước"
      },
    }
  });
  $('.data-table').wrap('<div class="dataTables_scroll" />');
})

//customize date input
$(document).ready(function () {
  $('.reservation').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    autoUpdateInput: true,
    locale: {
      format: 'DD/MM/YYYY',
    }
  })
  // if (window.location.href.indexOf('create') > -1) {
  //   $('.js-clear').val('');
  // };
});

