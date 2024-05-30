$(function () {
  $("#datasd").contextMenu({
    selector: "tr",
    callback: function (key, options) {},
    items: {
      edit: {
        name: "Sửa sổ đoàn",
        icon: "edit",
        callback: function (key, opt) {
          $("#idEdit").val($(this).find("td:eq(0)").text());
          $("#masv_SoDoanEdit").val($(this).find("td:eq(1)").text());
          $("#trangthai_Edit").val($(this).find("td:eq(2)").text());
          $("#ghichu_Edit").val($(this).find("td:eq(4)").text());
          $("#EditDiem").modal("show");
        },
      },
      delete: {
        name: "Xoá sổ đoàn",
        icon: "delete",
        callback: function (key, opt) {
          $("#idDel").val($(this).find("td:eq(0)").text());
          $("#nameDel").html($(this).find("td:eq(1)").text());
          $("#DeleteDiem").modal("show");
        },
      }

      //   sep1: "---------",
      // "quit": {
      //     name: "Quit",
      //     icon: function ($element, key, item) {
      //         return 'context-menu-icon context-menu-icon-quit';
      //     }
      // }
    }
  });
});
$("#select_sodoan_lop").on("change", function () {
  //doi tuong select diemrrenlop theo hàm
  // var values = $(this).serialize();
  var values = $(this).val(); //bien hc ki lay gia tri cua doi tuong hcki_diemren
  $.ajax({
    //xu li ajax
    url: "mics/filtersodoan.php",
    method: "POST",
    data: {
      id: values,
    },
    success: function (data) {
      //neu thanh cong thi thuc hien ham vs đối số data
      //alert(data);
      $("#show_list_sodoan").html(data); //đỗ html vào  thân bảng
    },
  });
});