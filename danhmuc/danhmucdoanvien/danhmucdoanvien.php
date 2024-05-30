<!-- DataTales Example -->

<?php
if (isset($_POST['Add'])) {
    $hoten = $_POST['hoten'];
    $masv = $_POST['masv'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $diachi = $_POST['diachi'];
    $malop = $_POST['malop'];
    $pattern = "/[\!@#$%^&*()]/";
    // Nếu người dùng có chọn file để upload
    if (isset($_FILES['path'])) {
        // Nếu file upload không bị lỗi,
        // Tức là thuộc tính error > 0
        if ($_FILES['path']['error'] > 0) {
            notifyFail('Yêu cầu nhập ảnh!');
        } else {
            if (strlen($masv) > 10 ) {
                notifyFail('Yêu cầu nhập đúng mã sinh viên!');
            } else {
                $msv = getmasv();
                $temp = 0;
                while ($row = mysqli_fetch_array($msv)) {
                    if ($masv == $row['masv']) {
                        $temp++;
                    }
                }
                if ($temp > 0) {
                    notifyFail('Mã sinh viên đã tồn tại!');
                } else {
                    try {
                        $date = getdate();
                        $date1 = substr($ngaysinh, 0, 4);
                    } catch (Exception $e) {
                        $date1 = 0;
                    }
                    if ($date1 == 0) {
                        notifyFail('Yêu cầu nhập ngày sinh!');
                    } else {
                        if ($date['year'] - $date1 < 18) {
                            notifyFail("Không phải đoàn viên!");
                        } else {
                            // Upload file
                            if ($malop == "chuachon") {
                                notifyFail('Yêu cầu chọn lớp!');
                            } else {
                                if (str_word_count($hoten) < 2 || preg_match($pattern, $hoten)) {
                                    notifyFail('Họ tên không hợp lệ!');
                                } else {
                                    move_uploaded_file($_FILES['path']['tmp_name'], './img/' . $_FILES['path']['name']);
                                    notifySuccess("Thêm thành công!");
                                    $path = './img/' . $_FILES['path']['name'];
                                    insertCharacter($masv, $hoten, $ngaysinh, $gioitinh, $diachi, $malop, $path);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

if (isset($_POST['Edit'])) {
    $id = $_POST['idEdit'];

    $ht = $_POST['htEdit'];
    $ns = $_POST['nsEdit'];
    $dc = $_POST['dcEdit'];
    $l = $_POST['lEdit'];
    $gt = $_POST['gtEdit'];
    $pattern = "/[\!@#$%^&*()]/";
    if (isset($_FILES['pathEdit'])) {

        if ($_FILES['pathEdit']['error'] < 0) {
            notifySuccess("Sửa ảnh thành công!");
            updateCharacter($id, $ht, $ns, $gt, $dc, $l);
        } else {
            // Upload file
            try {
                $date = getdate();
                $date1 = substr($ns, 0, 4);
            } catch (Exception $e) {
                $date1 = 0;
            }
            if ($date1 == 0) {
                notifyFail('Yêu cầu nhập ngày sinh!');
            } else {
                if ($date['year'] - $date1 < 18) {
                    notifyFail("Không phải đoàn viên!");
                } else {
                    if (str_word_count($ht) < 2 || preg_match($pattern, $ht)) {
                        notifyFail('Họ tên không hợp lệ!');
                    } else {
                        // Upload file
                        move_uploaded_file($_FILES['pathEdit']['tmp_name'], './img/' . $_FILES['pathEdit']['name']);
                        notifySuccess("Sửa thành công!");
                        $path = './img/' . $_FILES['pathEdit']['name'];
                        updateCharacter_Anh($id, $ht, $ns, $gt, $dc, $l, $path);
                    }
                }
            }
        }
    } else {
        notifySuccess("Sửa ảnh thành công!");
        updateCharacter($id, $ht, $ns, $gt, $dc, $l);
    }
}

if (isset($_POST['Del'])) {
    $id = $_POST['idDel'];

    notifySuccess("Xoá thành công!");
    deleteCharacter($id);
}
if (isset($_POST['Delete'])) {

    notifySuccess("Xoá thành công!");
    delete();
}


include_once('danhmuc/danhmucdoanvien/modals.php');
?>




<h3 class="m-0 font-weight-bold text-primary">Danh sách đoàn viên theo đơn vị lớp</h3>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-danger" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#Delete">
            Xóa tất cả
        </a>
        <a class="btn btn-info float-right" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#AddFileExel">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Thêm danh sách đoàn viên mới
        </a>

        <a class="btn btn-info float-right" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#AddCharacter">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
            Thêm đoàn viên mới
        </a>


    </div>





    <div class="card-body">
        <div>
            <div class="form-row">


                <!-- select option loc lop -->
                <select name="select_org" id="select_org" style="width: 25%" class="form-control">
                    <option value="all">Tất cả</option>
                    <?php
                    $lop = getAllLop();
                    while ($row_lop = mysqli_fetch_array($lop)) {
                    ?>
                        <option value="<?php echo $row_lop['malop'] ?>"><?php echo $row_lop['tenlop'] ?></option>
                    <?php } ?>
                </select>
            </div>



        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">MSSV</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Ngày sinh</th>
                        <th class="text-center">Giới tính</th>

                        <th class="text-center">Địa chỉ </th>
                        <th class="text-center">Lớp</th>

                    </tr>
                </thead>

                <tbody id="show_list_by_org">

                    <?php
                    $list = getDoanVien_Lop();
                    while ($row_list = mysqli_fetch_array($list)) {
                        ob_start();
                    ?>
                        <tr>
                            <td>{masv}</td>
                            <td><a href="index.php?p=quanlydoanvien&id={masv}">{hoten}</a></td>
                            <td>{ngaysinh}</td>
                            <td>{gioitinh}</td>
                            <td>{diachi}</td>
                            <td class="{malop}">{tenlop}</td>
                        </tr>
                    <?php
                        $s = ob_get_clean();
                        $s = str_replace("{masv}", $row_list['masv'], $s);
                        $s = str_replace("{hoten}", $row_list['hoten'], $s);
                        $s = str_replace("{ngaysinh}", $row_list['ngaysinh'], $s);
                        $s = str_replace("{gioitinh}", $row_list['gioitinh'], $s);
                        $s = str_replace("{diachi}", $row_list['diachi'], $s);
                        $s = str_replace("{tenlop}", $row_list['tenlop'], $s);
                        $s = str_replace("{malop}", $row_list['malop'], $s);
                        echo $s;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>




</div>
<script>

</script>
<script src="danhmuc/danhmucdoanvien/script.js"></script>