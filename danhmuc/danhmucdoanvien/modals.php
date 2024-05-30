<?php
include_once('mics/config.php');
include_once('mics/function.php');
?>
<!-- Add Character Modal-->
<?php
require('Classes/PHPExcel.php');
if (isset($_POST['Up'])) {
    try {
        $file = $_FILES['file']['tmp_name'];
        $objReader = PHPExcel_IOFactory::createReaderForFile($file);

        $objExcel = $objReader->load($file);
        $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);
        $highesRow = $objExcel->setActiveSheetIndex()->getHighestRow();
        for ($row = 2; $row <= $highesRow; $row++) {
            $masv = $sheetData[$row]['A'];
            $hoten = $sheetData[$row]['B'];
            $ngaysinh = $sheetData[$row]['C'];
            $gioitinh = $sheetData[$row]['D'];
            $diachi = $sheetData[$row]['E'];
            $malop = $sheetData[$row]['F'];
            $path = $sheetData[$row]['G']; 
            // $sql = "INSERT INTO thongtindoanvien(masv,hoten,ngaysinh,gioitinh,diachi,malop,anh) values ($masv, $hoten, $ngaysinh, $gioitinh, $diachi, $malop, $path)"
            insertCharacter($masv, $hoten, $ngaysinh, $gioitinh, $diachi, $malop, $path);
        }
    } catch (Exception $e) {
        notifyFail('Yêu cầu nhập file!');
    }
}
// if (isset($_POST['Sub'])) {
//     echo "<script>alert(hihihihi)</script>";
//     echo "<script>window.location='http://localhost/qldv1/index.php?p=quanlydoanvien';</script>";
//     $objExcel = new PHPExcel;
//     $objExcel->setActiveSheetIndex(0);
//     $sheet = $objExcel->getActiveSheet()->setTitle('qldv');

//     $rowCount = 1;
//     $sheet->setCellValue('A' . $rowCount, 'Mã SV');
//     $sheet->setCellValue('B' . $rowCount, 'Họ Tên');
//     $sheet->setCellValue('C' . $rowCount, 'Ngày Sinh');
//     $sheet->setCellValue('D' . $rowCount, 'Giới Tính');
//     $sheet->setCellValue('E' . $rowCount, 'Địa Chỉ');
//     $sheet->setCellValue('F' . $rowCount, 'Mã Lớp');
//     $sheet->setCellValue('G' . $rowCount, 'Ảnh');

//     $result = getDoanVien();
//     while ($row = mysqli_fetch_array($result)) {
//         $rowCount++;
//         $sheet->setCellValue('A' . $rowCount, $row['masv']);
//         $sheet->setCellValue('B' . $rowCount, $row['hoten']);
//         $sheet->setCellValue('C' . $rowCount, $row['ngaysinh']);
//         $sheet->setCellValue('D' . $rowCount, $row['gioitinh']);
//         $sheet->setCellValue('E' . $rowCount, $row['diachi']);
//         $sheet->setCellValue('F' . $rowCount, $row['malop']);
//         $sheet->setCellValue('G' . $rowCount, $row['anh']);
//     }

//     $objWriter =  PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
//     $filename = 'export.xls';
//     $objWriter->save($filename);

//     // header('Content-Type: aplication/xlsx; charset=utf-8');
//     // header('Content-Disposition: attachment; filename="' . $filename . '"');
//     // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//     // header('Content-Length: ' . filesize($filename));
//     // header('Content-Transfer-Encoding: binary');
//     // header('Cache-Control: must-revalidate');
//     // header('Pragma: no-cache');
//     session_start();
//     readfile($filename);
//     exit;
//     return;
// }

?>
<div class="modal fade" id="AddCharacter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-plus"></i> Thêm đoàn viên</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Mã sinh viên<span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="masv" placeholder="" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="">Họ và tên <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="hoten" placeholder="" required>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="">Ngày sinh</label>
                        <input type="date" class="form-control" name="ngaysinh" placeholder="">

                    </div>

                    <div class="form-group col-md-7">
                        <label for="">Lớp</label>
                        <select name="malop" class="form-control" required>
                            <option value="chuachon">--Chọn lớp--</option>
                            <?php
                            $cbxlop = getAllLop();
                            while ($row_clop = mysqli_fetch_array($cbxlop)) {
                            ?>
                                <option value="<?php echo $row_clop['malop'] ?>"><?php echo $row_clop['tenlop'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label for="">Giới tính</label>
                        <select name="gioitinh" id="" class="form-control" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="">Địa chỉ <span style="color: red">*</span> </label>
                        <input type="text" class="form-control" name="diachi" placeholder="" required>
                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="">Ảnh</label>
                        <input type="file" name="path" id="path" class="form-control">
                    </div>


                </div>



            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Huỷ</button>
                <button class="btn btn-secondary" type="reset">Nhập lại</button>
                <button class="btn btn-success" type="submit" name="Add">Thêm</button>
            </div>
        </form>
    </div>
</div>
<!-- Edit Character Modal-->
<div class="modal fade" id="EditCharacter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-edit    "></i> Sửa đoàn viên</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">




                <input type="hidden" name="idEdit" id="idEdit" value="" class="form-control">





                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="">Tên đoàn viên <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="htEdit" name="htEdit" placeholder="" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Giới tính</label>
                        <select id="gtEdit" name="gtEdit" class="form-control" required>

                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>

                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="">Ngày sinh</label>
                        <input type="date" class="form-control" id="nsEdit" name="nsEdit" placeholder="">

                    </div>
                </div>

                <div class="form-group">
                    <label for="">Địa chỉ<span style="color: red">*</span></label>
                    <textarea class="form-control" id="dcEdit" name="dcEdit" rows="2" placeholder="" required></textarea>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-8">
                        <label for="">Lớp <span style="color: red">*</span> </label>
                        <select id="lEdit" name="lEdit" class="form-control" required>
                            <?php
                            $chap = getAllLop();
                            while ($row_chapter = mysqli_fetch_array($chap)) {
                            ?>
                                <option value="<?php echo $row_chapter['malop'] ?>"><?php echo $row_chapter['tenlop'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>



                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="">Ảnh</label>
                        <input type="file" name="pathEdit" id="pathEdit" class="form-control">
                    </div>


                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Huỷ</button>
                <button class="btn btn-secondary" type="reset"> <i class="fa fa-retweet" aria-hidden="true"></i> Nhập lại</button>
                <button class="btn btn-success" type="submit" name="Edit"><i class="fas fa-edit    "></i> Sửa</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Character Modal-->
<div class="modal fade" id="DeleteCharacter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fa fa-recycle" aria-hidden="true"></i> Xoá đoàn viên</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group align-content-center">


                    <input type="hidden" name="idDel" id="idDel" value="" class="form-control">

                </div>



                <div class="form-row">
                    <div class="form-group">
                        <label for="">Bạn muốn xoá đoàn viên</label>
                        <u><strong><label for="" id="nameDel"></label></strong></u>?

                    </div>

                </div>





            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Huỷ</button>

                <button class="btn btn-danger" type="submit" name="Del"> <i class="fa fa-recycle" aria-hidden="true"></i> Xoá</button>
            </div>
        </form>
    </div>
</div>
<!-- Add File EXEL Modal-->
<div class="modal fade" id="AddFileExel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-plus"></i> Thêm danh sách đoàn viên</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>



            <div class="modal-footer">
                <form method="POST" action="file_upload.php" enctype="multipart/form-data">
                    <!-- <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button> -->
                    <input class="btn btn-success" type="file" name="file">
                    <button class="btn btn-success" type="submit" name="Up">Upload</button>
                </form>
            </div>
        </form>
    </div>
</div>

<!-- Sub File EXEL Modal
<div class="modal fade" id="SubFileExel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-plus"></i> In danh sách đoàn viên</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <form method="POST">
                    <button class="btn btn-success" type="submit" name="Sub">Export File Excel</button>
                </form>
            </div>
        </form>
    </div>
</div> -->
<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fa fa-recycle" aria-hidden="true"></i> Xoá đoàn viên</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">



                <div class="form-row">
                    <div class="form-group">
                        <label for="">Bạn muốn xoá tất cả đoàn viên ?</label>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Huỷ</button>

                <button class="btn btn-danger" type="submit" name="Delete"> <i class="fa fa-recycle" aria-hidden="true"></i> Xoá</button>
            </div>
        </form>
    </div>
</div>