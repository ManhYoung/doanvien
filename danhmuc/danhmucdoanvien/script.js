$(function () {
  $("#dataTable").contextMenu({
    selector: "tr",
    callback: function (key, options) {},
    items: {
      edit: {
        name: "Sửa thông tin đoàn viên",
        icon: "edit",
        callback: function (key, opt) {
          //lay du lieu tu bang
          $("#idEdit").val($(this).find("td:eq(0)").text());
          $("#htEdit").val($(this).find("td:eq(1)").text());
          $("#nsEdit").val($(this).find("td:eq(2)").text());
          $("#gtEdit").val($(this).find("td:eq(3)").text());

          //      $("#preEdit").find("option[text='" + $(this).find('td:eq(4)').text() + "']").attr("selected", true);
          //lay gtri cua thuoc tinh class, gán gtri vua lay duoc vao select option
          $("#lEdit").val($(this).find("td:eq(5)").attr("class"));
          $("#dcEdit").val($(this).find("td:eq(4)").text());
          $("#EditCharacter").modal("show");
        },
      },
      delete: {
        name: "Xoá đoàn viên",
        icon: "delete",
        callback: function (key, opt) {
          $("#idDel").val($(this).find("td:eq(0)").text());
          $("#nameDel").html($(this).find("td:eq(1)").text());
          $("#DeleteCharacter").modal("show");
        },
      },
      info: {
        name: "Xem thông tin đoàn viên",
        icon: "",
        callback: function (key, opt) {
          window.location =
            "index.php?p=quanlydoanvien&id=" + $(this).find("td:eq(0)").text();
        }
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
