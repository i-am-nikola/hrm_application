// customize datatable plugin
$(document).ready(() => {
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
      },
    }
  });
  $('.data-table').wrap('<div class="dataTables_scroll" />');
})

//customize daterangepicker, format date to dd/mm/yyy
$(document).ready(function () {
  $('.reservation').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    autoUpdateInput: false,
    setDate: "",
    locale: {
      format: 'DD/MM/YYYY',
    }
  })

  $('.reservation').on('apply.daterangepicker', function (ev, picker) {
    $(this).val(picker.startDate.format('DD/MM/YYYY'));
  });

  $('.reservation').on('cancel.daterangepicker', function (ev, picker) {
    $(this).val('');
  });

});

