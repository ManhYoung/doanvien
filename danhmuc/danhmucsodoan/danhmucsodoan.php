<!-- DataTales Example -->

<?php

include_once('function.php'); //neu post add có tồn tại thì tạo ra biến mssv tt gc
if (isset($_POST['Add'])) {
    $masv = $_POST['masv_sodoan'];
    $tt = $_POST['trangthai'];
    $gc = $_POST['ghichu'];



    if ($masv == "chuachon") {
        notifyFail('Yêu cầu chọn sinh viên!');
    } else {
        if ($gc == '') {
            $gc = "null";
        }
        notifySuccess("Thêm thành công!");
        insertSoDoan($masv, $tt, $gc);
    }
}
if (isset($_POST['Edit'])) {
    $id = $_POST['idEdit'];



    $tt = $_POST['trangthai_Edit'];
    $gc = $_POST['ghichu_Edit'];

    if ($gc == '') {
        $gc = "null";
    }
    notifySuccess("Sửa thành công!");
    updateSoDoan($id, $tt, $gc);
}

if (isset($_POST['Del'])) { // neu post del có tồn tại thì xóa id
    $id = $_POST['idDel'];

    notifySuccess("Xoá thành công!");
    deleteSoDoan($id);
}
if (isset($_POST['Delete'])) {

    notifySuccess("Xoá thành công!");
    deletesd();
}

include_once('danhmuc/danhmucsodoan/modals.php');
?>

<h3 class="m-0 font-weight-bold text-primary">Danh mục sổ đoàn<nav></nav>
</h3>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-danger" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#Delete">
            Xóa tất cả
        </a>
        <a class="btn btn-info float-right" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#AddDiem" id="btnAddDRL">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Thêm
        </a>
        <a class="btn btn-info float-right" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#AddFileExel">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Thêm danh sách sổ đoàn
        </a>

    </div>





    <div class="card-body">
        <div>
            <div class="form-row">

                <select name="select_sodoan_lop" id="select_sodoan_lop" style="width: 25%" class="form-control">
                    <option value="all">-- Tất cả lớp --</option>
                            
                    <?php
                    $lop = getAllLop(); //lay thong tin lop trong bảng lớp(có mã lớp, tên lớp)
                    while ($row_lop = mysqli_fetch_array($lop)) { //duyệt qua từng dòng của bảng lớp, còn thì để vào option
                    ?>
                        <option value="<?php echo $row_lop['malop'] ?>"><?php echo $row_lop['tenlop'] ?></option>
                        <!-- lay mã nhưng hiện lên tên lớp -->
                    <?php } ?>
                </select>


            </div>

        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="datasd" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th class="text-center">MSSV</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Trạng thái</th>
                        <th class="text-center">Lớp</th>
                        <th class="text-center">Ghi chú</th>




                    </tr>
                </thead>

                <tbody id="show_list_sodoan">


                    <?php
                    $list = getSoDoan_Full();
                    while ($row_list = mysqli_fetch_array($list)) { //lấy từng dòng trong mảng list
                        ob_start(); //bat dau moi thu thuong se dc xuất ra
                    ?>
                        <tr>

                            <!-- <td name="{iddiemrenluyen}" class="{iddiemrenluyen}"><a href="index.php?p=quanlydoanvien&id={masv}">{masv}</a></td> -->
                            <td>{masv}</td>
                            <td><a href="index.php?p=quanlydoanvien&id={masv}">{hoten}</a></td>
                            <td>{trangthai}</td>
                            <td class="{malop}">{tenlop}</td>
                            <td>{ghichu}</td>


                        </tr>
                    <?php
                        $s = ob_get_clean();

                        $s = str_replace("{masv}", $row_list['masv'], $s);

                        $s = str_replace("{hoten}", $row_list['hoten'], $s);
                        $s = str_replace("{trangthai}", $row_list['trangthai'], $s);
                        $s = str_replace("{tenlop}", $row_list['tenlop'], $s);
                        $s = str_replace("{malop}", $row_list['malop'], $s);
                        $s = str_replace("{ghichu}", $row_list['ghichu'], $s);
                        echo $s;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>




</div>
<script>

</script>
<script src="danhmuc/danhmucsodoan/script.js"></script>