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

// convert name to slug
$(document).ready(() => {
  function convertSlug(element) {
    var slug = element.toLowerCase();
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/đ/gi, 'd');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '')
    slug = slug.replace(/ /gi, '-');
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    return slug;
  };

  $('.app-form input[name="name"]').on('keyup', e => {
    let element = $(e.target).val();
    $('input[name="slug"]').val(convertSlug(element));
  })
})

// print contract & decision
$(document).ready(() => {
  $("#btn-print-contract").on('click', () => {
    printElement($('#contract-content'));
  })

  $("#btn-print-decision").on('click', () => {
    printElement($('#decision-content'));
  })

  function printElement(elemt) {
    var printContents = elemt.html();
    var originalContents = $('body').html();
    $('body').html(printContents);
    window.print();
    $('body').html(originalContents);
    setTimeout(() => {
      location.reload();
    }, 1000);
  }
});

