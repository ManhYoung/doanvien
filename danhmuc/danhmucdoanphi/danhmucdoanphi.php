<!-- DataTales Example -->
<?php
include_once('function.php');
if (isset($_POST['Add'])) { //nếu post có giá trị là add thì sẽ khởi tạo thông tin với mã, số tiền, ngày thu, trạng thái

    $masv = $_POST['masv'];
    $sotien = $_POST['sotien'];
    $ngaythu = $_POST['ngaythu'];
    $trangthai = $_POST['trangthai'];

    if ($masv == "chuachon") {
        notifyFail('Yêu cầu chọn sinh viên!');
    } else {
        if ($sotien <= 0) {
            notifyFail('Đoàn phí không hợp lệ!');
        } else {
            $date = getdate();
            $date1 = substr($ngaythu, 0, 4);
            if ($date1 <= $date['year']) {
                notifySuccess("Thêm thành công!"); // thông báo thêm thành công
                addDoanPhi($masv, $sotien, $ngaythu, $trangthai);
            } else {
                notifyFail("Năm không hợp lệ!");
            }
        }
    }
}
if (isset($_POST['Edit'])) {
    $iddoanphi = $_POST['idEdit'];
    $masv = $_POST['masv_Edit'];
    $sotien = $_POST['sotien_edit'];
    $ngaythu = $_POST['ngaythu_edit'];
    $trangthai = $_POST['trangthai_edit'];
    if ($sotien <= 0) {
        notifyFail('Đoàn phí không hợp lệ!');
    } else {
        $date = getdate();
        $date1 = substr($ngaythu, 0, 4);
        if ($date1 <= $date['year']) {
            notifySuccess("Sửa thành công!");
            updateDoanPhi($iddoanphi, $sotien, $ngaythu, $trangthai);
        } else {
            notifyFail("Năm không hợp lệ!");
        }
    }
}
if (isset($_POST['Del'])) {
    $id = $_POST['idDel'];
    notifySuccess("Xoá thành công!");
    deleteDoanPhi($id);
}
if (isset($_GET['select_org'])) {
    alert("post");
    // $action = $_POST['action'];
    // if ($action == 'select_org') {
    //     // $org = getAllCharactersByOrg($_POST['org']);
    //     alert($_POST['org']);
    // } else {
    //     //  $org = getAllCharactersDetails();
    //     alert("không nhận đc");
    // }
}
if (isset($_POST['Delete'])) {

    notifySuccess("Xoá thành công!");
    deletedp();
}
include_once('modals.php');

?>
<h3 class="m-0 font-weight-bold text-primary">Danh mục đoàn phí</h3>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-danger" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#Delete">
            Xóa tất cả
        </a>
        <a class="btn btn-info float-right" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#AddLop" id="btnAddDP">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Thêm
        </a>
        <a class="btn btn-info float-right" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#AddFileExel">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Thêm danh sách đoàn phí
        </a>
    </div>
    <div class="card-body">
        <div>
            <div class="form-row">
                <!-- <select name="select_diemren_lop" id="select_diemren_lop" style="width: 25%" class="form-control">
                    <option value="all">-- Tất cả lớp --</option>
                    <?php
                    $lop = getAllLop();
                    while ($row_lop = mysqli_fetch_array($lop)) {
                    ?>
                        <option value="<?php echo $row_lop['malop'] ?>"><?php echo $row_lop['tenlop'] ?></option>
                    <?php } ?>
                </select> -->



            </div>

        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataDP" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th class="text-center">Mã sinh viên</th>
                        <th class="text-center">Họ tên</th>
                        <th class="text-center">Số tiền</th>
                        <th class="text-center">Ngày thu</th>
                        <th class="text-center">Trạng thái</th>
                    </tr>
                </thead>

                <tbody id="show_list_by_donvi">

                    <?php
                    $list = getDoanPhi();
                    while ($row_list = mysqli_fetch_array($list)) {
                        ob_start();
                    ?>
                        <tr>
                            <td name="{iddoanphi}" class="{iddoanphi}">
                                {masv}</td>
                            <td>{hoten}
                            </td>
                            <td>{sotien}</td>
                            <td>{ngaythu}</td>
                            <td>{trangthai}</td>

                        </tr>
                    <?php
                        $s = ob_get_clean();
                        $s = str_replace("{iddoanphi}", $row_list['iddoanphi'], $s);
                        $s = str_replace("{masv}", $row_list['masv'], $s);
                        $s = str_replace("{hoten}", $row_list['hoten'], $s);
                        $s = str_replace("{sotien}", $row_list['sotien'], $s);
                        $s = str_replace("{ngaythu}", $row_list['ngaythu'], $s);
                        $s = str_replace("{trangthai}", $row_list['trangthai'], $s);

                        echo $s;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="danhmuc/danhmucdoanphi/script.js">

</script>