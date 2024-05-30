$(function () {
  $("#dataDR").contextMenu({
    //bien data DR sd phuong thuc contextmenu trong jquery de tao ra mot menu khi nhan chuot phai
    selector: "tr", //doi tuong dc sd la tr
    callback: function (key, options) {}, //ham goi ra khi nhan chuot phai
    items: {
      //tao ra items
      edit: {
        name: "Sửa điểm",
        icon: "edit",
        callback: function (key, opt) {
          //goi ham ho trợ cho việc sửa
          $("#idEdit").val($(this).find("td:eq(0)").attr("name"));

          $("#masv_diemrenEdit").val($(this).find("td:eq(1)").text());

          $("#diemEdit").val($(this).find("td:eq(2)").text());

          $("#hockyEdit").val($(this).find("td:eq(3)").text());

          $("#namhocEdit").val($(this).find("td:eq(4)").text());

          //      $("#preEdit").find("option[text='" + $(this).find('td:eq(4)').text() + "']").attr("selected", true);

          $("#EditDiem").modal("show");
        },
      },
      delete: {
        name: "Xoá điểm",
        icon: "delete",
        callback: function (key, opt) {
          $("#idDel").val($(this).find("td:eq(0)").attr("name"));
          $("#nameDel").html($(this).find("td:eq(1)").text());
          $("#DeleteDiem").modal("show");
        },
      }

      // "sep1": "---------",
      // "quit": {
      //     name: "Quit",
      //     icon: function ($element, key, item) {
      //         return 'context-menu-icon context-menu-icon-quit';
      //     }
      // }
    }
  });
});

$("#btnAddDRL").on("click", function () {
  //doi tuong addDRL xu ly sự kiện click theo hàm
  // var values = $(this).serialize();
  var d = new Date();
  var year = d.getFullYear();
  $("#namhoc").val(year);
});

$("#select_diemren_lop").on("change", function () {
  //doi tuong select diemrrenlop theo hàm
  // var values = $(this).serialize();
  var values = $(this).val();
  var hocki = $("#hocki_diemren").val(); //bien hc ki lay gia tri cua doi tuong hcki_diemren
  $.ajax({
    //xu li ajax
    url: "mics/filterdiemrenluyen_hocky.php",
    method: "POST",
    data: {
      id: values,
      hocky: hocki,
    },
    success: function (data) {
      //neu thanh cong thi thuc hien ham vs đối số data
      //alert(data);
      $("#show_list_diemren").html(data); //đỗ html vào  thân bảng
    },
  });
});

$("#malop_diemren").on("change", function () {
  // var values = $(this).serialize();
  var values = $(this).val();
  $.ajax({
    url: "mics/loaddssinhvien.php",
    method: "POST",
    data: {
      id: values,
    },
    success: function (data) {
      //alert(data);
      $("#masv_diemren").html(data);
    },
  });
});

$("#hocki_diemren").on("change", function () {
  // var values = $(this).serialize();
  var values = $(this).val();
  var iden = $("#select_diemren_lop").val();
  $.ajax({
    url: "mics/filterdiemrenluyen_hocky.php",
    method: "POST",
    data: {
      hocky: values,
      id: iden,
    },
    success: function (data) {
      //alert(data);
      $("#show_list_diemren").html(data);
    },
  });
});
