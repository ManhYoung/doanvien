$(function () {
  $("#dataDP").contextMenu({
    selector: "tr",
    callback: function (key, options) {},
    items: {
      edit: {
        name: "Sửa đoàn phí",
        icon: "edit",
        callback: function (key, opt) {
          $("#idEdit").val($(this).find("td:eq(0)").attr("name"));

          $("#masv_Edit").val($(this).find("td:eq(1)").text());

          $("#sotien_edit").val($(this).find("td:eq(2)").text());
          $("#ngaythu_edit").val($(this).find("td:eq(3)").text());
          $("#trangthai_edit").val($(this).find("td:eq(4)").text());

          //      $("#preEdit").find("option[text='" + $(this).find('td:eq(4)').text() + "']").attr("selected", true);

          $("#EditModal").modal("show");
        },
      },
      delete: {
        name: "Xoá",
        icon: "delete",
        callback: function (key, opt) {
          $("#idDel").val($(this).find("td:eq(0)").attr("name"));
          $("#nameDel").html($(this).find("td:eq(1)").text());
          $("#DeleteModal").modal("show");
        },
      }

      // sep1: "---------",
      // quit: {
      //   name: "Quit",
      //   icon: function ($element, key, item) {
      //     return "context-menu-icon context-menu-icon-quit";
      //   },
      // },
    }
  });
});

document.getElementById("ngaythu").valueAsDate = new Date();
