<!-- DataTales Example -->
<?php
include_once('danhmuc/danhmuclop/function.php');
if (isset($_POST['Add'])) {
    $malop = $_POST['malop'];
    $tenlop = $_POST['tenlop'];

    // $dh = substr($malop, 0, 1);
    // $ten = substr($malop, 1, 2);
    // if (strlen($malop) != 3 || $dh != "D" || is_numeric($ten) == true ) {
    //     notifyFail('Mã lớp sai!');
    // } else {
        $ml = getLop();
        $temp = 0;
        while ($row = mysqli_fetch_array($ml)) {
            if ($malop == $row['malop']) {
                $temp++;
            }
        }
        if ($temp > 0) {
            notifyFail('Mã lớp đã tồn tại!');
        } else {
            $pattern = "/[\!@#$%^&*()]/";
            if (preg_match($pattern, $ten)) {
                notifyFail('Tên lớp không hợp lệ!');
            } else {
                notifySuccess("Thêm thành công!");
                addLop($malop, $tenlop);
            }
        }
    // }
}
if (isset($_POST['Edit'])) {
    $malop = $_POST['idEdit'];
    $ten = $_POST['tenEdit'];
    $pattern = "/[\!@#$%^&*()]/";
    if (preg_match($pattern, $ten)) {
        notifyFail('Tên lớp không hợp lệ!');
    } else {
        notifySuccess("Sửa thành công!");
        updateLop($malop, $ten);
    }
}
if (isset($_POST['Del'])) {
    $id = $_POST['idDel'];
    notifySuccess("Xoá thành công!");
    DeleteLop($id);
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
include_once('danhmuc/danhmuclop/modals.php');

?>
<h3 class="m-0 font-weight-bold text-primary">Danh sách lớp của đoàn khoa CNTT</h3>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-info float-right" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#AddLop">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Thêm lớp mới
        </a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataDMLop" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Mã lớp</th>
                        <th class="text-center">Tên lớp</th>

                    </tr>
                </thead>

                <tbody id="show_list_by_lop">

                    <?php
                    $list = getLop();
                    while ($row_list = mysqli_fetch_array($list)) {
                        ob_start();
                    ?>
                        <tr>
                            <td>{malop}</td>
                            <td>{tenlop}</td>
                            <!-- <td><a href="index.php?p=quanlydoanvien&id={malop}">{tenlop}</a></td> -->

                        </tr>
                    <?php
                        $s = ob_get_clean();
                        $s = str_replace("{malop}", $row_list['malop'], $s);
                        $s = str_replace("{tenlop}", $row_list['tenlop'], $s);

                        echo $s;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
