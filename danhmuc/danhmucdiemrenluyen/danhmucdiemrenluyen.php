<!-- DataTales Example -->

<?php

include_once('function.php');
if (isset($_POST['Add'])) { //neu $post add co ton tai thi tao ra bien diem, masv, hc ki, nam hc
    $diem = $_POST['diem'];
    $masv = $_POST['masv_diemren'];
    $hocky = $_POST['hocky'];
    $namhoc = $_POST['namhoc'];


    if ($diem > 100) {
        notifyFail("Điểm phải <= 100!"); //bẫy lỗi nhập sai
    } else if ($diem < 1) {
        notifyFail("Điểm phải >= 1!");
    } else {
        $date = getdate();
        if ($namhoc > $date['year']) {
            notifyFail("Năm không hợp lệ!");
        } else {
            $msv = getSinhVien_nam_hk($namhoc, $hocky);
            $temp = 0;
            while ($row = mysqli_fetch_array($msv)) {
                if ($masv == $row['masv']) {
                    $temp++;
                }
            }
            if ($temp > 0) {
                notifyFail('Sinh viên đã có điểm!');
            } else {
                notifySuccess("Thêm thành công!");
                insertDiemRenLuyen($masv, $diem, $namhoc, $hocky);
            }
        }
    }
}
if (isset($_POST['Edit'])) {
    $id = $_POST['idEdit'];


    $d = $_POST['diemEdit'];
    $nh = $_POST['namhocEdit'];
    $hk = $_POST['hockyEdit'];

    if ($d > 100) {
        notifyFail("Điểm phải <= 100!");
    } else if ($d < 1) {
        notifyFail("Điểm phải >= 1!");
    } else {
        $date = getdate();
        if ($nh <= $date['year']) {
            notifySuccess("Sửa thành công!");
            updateDiemRenLuyen($id, $d, $nh, $hk);
        } else {
            notifyFail("Năm không hợp lệ!");
        }
    }
}

if (isset($_POST['Del'])) { // khi post del thì sẽ thực hiện công việc xóa thông tin điểm rèn đó theo cái id
    $id = $_POST['idDel'];

    notifySuccess("Xoá thành công!"); // hiện thông báo khi xóa xong
    deleteDiemRenLuyen($id);
}
if (isset($_POST['Delete'])) {

    notifySuccess("Xoá thành công!");
    deletedr();
}

include_once('danhmuc/danhmucdiemrenluyen/modals.php'); //đổ modal ra
?>

<h3 class="m-0 font-weight-bold text-primary">Danh mục điểm rèn luyện theo đơn vị lớp</h3>
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
            Thêm danh sách điểm rèn
        </a>
    </div>





    <div class="card-body">
        <div>
            <div class="form-row">
                <select name="select_diemren_lop" id="select_diemren_lop" style="width: 25%" class="form-control">
                    <option value="all">-- Tất cả lớp --</option>
                    <?php
                    $lop = getAllLop(); //lay thong tin lop trong bảng lớp(có mã lớp, tên lớp)
                    while ($row_lop = mysqli_fetch_array($lop)) { //duyệt qua từng dòng của bảng lớp, còn thì để vào option
                    ?>
                        <option value="<?php echo $row_lop['malop'] ?>"><?php echo $row_lop['tenlop'] ?></option>
                        <!-- lay mã nhưng hiện lên tên lớp -->
                    <?php } ?>
                </select>

                &nbsp;
                <select name="hocki_diemren" id="hocki_diemren" style="width: 25%" class="form-control">
                    <option value="0">-- Tất cả học kỳ --</option>
                    <option value="1">Học kì 1</option>
                    <option value="2">Học kì 2</option>
                </select>
                <!-- khởi tạo các lựa chọn ở phần lọc theo học kì -->

            </div>

        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataDR" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th class="text-center">MSSV</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Điểm</th>
                        <th class="text-center">Học kỳ</th>
                        <th class="text-center">Năm học</th>
                        <th class="text-center">Lớp</th>
                        <!-- hiện thông tin hàng tiêu đề theo dạng bảng -->
                    </tr>
                </thead>

                <tbody id="show_list_diemren">

                    <?php
                    $list = getDiemRenLuyen_Full();
                    while ($row_list = mysqli_fetch_array($list)) { //lay từng dòng trong mảng list
                        ob_start();
                    ?>
                        <tr>

                            <td name="{iddiemrenluyen}" class="{iddiemrenluyen}">{masv}</td>
                            <td><a href="index.php?p=quanlydoanvien&id={masv}">{hoten}</a></td>
                            <td>{diem}</td>
                            <td>{hocky}</td>
                            <td>{namhoc}</td>
                            <td class="{malop}">{tenlop}</td>

                        </tr>
                    <?php
                        $s = ob_get_clean();
                        $s = str_replace("{iddiemrenluyen}", $row_list['iddiemrenluyen'], $s);
                        $s = str_replace("{masv}", $row_list['masv'], $s);
                        $s = str_replace("{diem}", $row_list['diem'], $s);
                        $s = str_replace("{hoten}", $row_list['hoten'], $s);
                        $s = str_replace("{namhoc}", $row_list['namhoc'], $s);
                        $s = str_replace("{hocky}", $row_list['hocky'], $s);
                        $s = str_replace("{tenlop}", $row_list['tenlop'], $s);
                        $s = str_replace("{malop}", $row_list['malop'], $s);
                        echo $s;
                    } ?>
                    <!-- hiển thị thông tin lọc được ở dạng bảng -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
</script>
<script src="danhmuc/danhmucdiemrenluyen/script.js"></script>
<!-- gọi đường dẫn tới file sử dụng hàm cho sự kiện phải chuột -->