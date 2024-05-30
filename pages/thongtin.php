<?php
include_once('mics/config.php');
include_once('mics/function.php');
$char = getThongTinDoanVienChiTiet($id);
$row_char = mysqli_fetch_array($char);
?>

<h2 class="h2 mb-4 text-gray-700"><?php echo $row_char['hoten'] ?> - MSSV: <?php echo $row_char['masv'] ?></h2>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">

            <div class="text-center">

                <!-- <img src="" onerror="this.src='https://newcastlebeach.org/images/image-not-available-2.jpg'" style="max-height: 150px; margin-bottom: 10px" class="rounded" alt="..."> -->
                <img src='<?php echo $row_char['anh'] ?>' style="max-height: 150px; margin-bottom: 10px" class="rounded" alt="...">
                <!-- C:\xampp\htdocs\QLDV1\pages\thongtin.php -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <div class="form-group">

                    <label for="">Ngày sinh</label>
                    <input type="text" name="" id="" class="form-control" placeholder="" value="<?php echo $row_char['ngaysinh'] ?>" aria-describedby="helpId" readonly>


                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Giới tính </label>
                    <input type="text" name="" id="" class="form-control" placeholder="" value="<?php echo $row_char['gioitinh'] ?>" aria-describedby="helpId" readonly>

                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Lớp</label>
                    <input type="text" name="" id="" class="form-control" placeholder="" value="<?php echo $row_char['malop'] ?> - <?php echo $row_char['tenlop'] ?>" aria-describedby="helpId" readonly>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="">Địa chỉ </label>
                    <input type="text" name="" id="" class="form-control" placeholder="" value="<?php echo $row_char['diachi'] ?>" aria-describedby="helpId" readonly>

                </div>
            </div>
        </div>
        <div class="row">

            <div class="card-body">
                <label for="bangdiemrenluyen">Điểm rèn luyện </label>
                <div class="table-responsive">
                    <table class="table table-bordered" id="bangdiemrenluyen" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Điểm</th>
                                <th class="text-center">Năm học</th>
                                <th class="text-center">Học kỳ</th>
                            </tr>
                        </thead>

                        <tbody id="">

                            <?php
                            $list = getThongTinDoanVien_DiemRenLuyen($id);
                            while ($row_list = mysqli_fetch_array($list)) {
                                ob_start();
                            ?>
                                <tr>
                                    <td>{diem}</td>
                                    <td>{namhoc}</td>
                                    <td>{hocky}</td>
                                </tr>
                            <?php
                                $s = ob_get_clean();
                                $s = str_replace("{diem}", $row_list['diem'], $s);
                                $s = str_replace("{namhoc}", $row_list['namhoc'], $s);
                                $s = str_replace("{hocky}", $row_list['hocky'], $s);
                                echo $s;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-body">
                <label for="bangdoanphi">Đoàn phí</label>
                <div class="table-responsive">
                    <table class="table table-bordered" id="bangdoanphi" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Số tiền</th>
                                <th class="text-center">Ngày thu</th>
                                <th class="text-center">Trạng thái</th>
                            </tr>
                        </thead>

                        <tbody id="">

                            <?php
                            $list = getThongTinDoanVien_DoanPhi($id);
                            while ($row_list = mysqli_fetch_array($list)) {
                                ob_start();
                            ?>
                                <tr>
                                    <td>{sotien}</td>
                                    <td>{ngaythu}</td>
                                    <td>{trangthai}</td>
                                </tr>
                            <?php
                                $s = ob_get_clean();
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
        <h4><a href="index.php?p=quanlydoanvien&id">Trở về</a></h4>
    </div>

</div>