$(function () {
    $('#dataYC').contextMenu({
        selector: 'tr',
        callback: function (key, options) {

        },
        items: {
            "edit": {
                name: "Duyệt",
                icon: "",
                callback: function (key, opt) {

                    $('#idDuyet').val($(this).find('td:eq(0)').attr('id-data'));



                    $('#nameDuyet').html($(this).find('td:eq(1)').text());
                    //      $("#preEdit").find("option[text='" + $(this).find('td:eq(4)').text() + "']").attr("selected", true);


                    $('#DuyetModal').modal('show');
                }
            },
            "delete": {
                name: "Không duyệt",
                icon: "",
                callback: function (key, opt) {


                    $('#idkoDuyet').val($(this).find('td:eq(0)').attr('id-data'));
                    $('#namekoDuyet').html($(this).find('td:eq(1)').text());
                    $('#koDuyetModal').modal('show');
                }
            },

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