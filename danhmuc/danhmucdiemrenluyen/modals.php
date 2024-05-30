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
            $diem = $sheetData[$row]['B'];
            $namhoc = $sheetData[$row]['C'];
            $hocki = $sheetData[$row]['D'];


            insertDiemRenLuyen($masv, $diem, $namhoc, $hocki);
        }
    } catch (Exception $e) {
        notifyFail('Yêu cầu nhập file!');
    }
}
?>
<div class="modal fade" id="AddDiem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-plus"></i> Nhập điểm</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">


                    <div class="form-group col-md-6">
                        <label for="malop_diemren">Lớp <span style="color:red">*</span></label>
                        <select name="malop_diemren" id="malop_diemren" class="form-control" required>
                            <option value="chuachon">-- Chọn lớp --</option>
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


                    <div class="form-group col-md-12">
                        <label for="masv_diemren">Sinh viên <span style="color:red">*</span></label>
                        <select name="masv_diemren" id="masv_diemren" class="form-control" required>

                        </select>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="diem">Điểm <span style="color:red">*</span></label>
                        <input type="number" class="form-control" name="diem" id="diem" placeholder="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="hocky">Học kỳ <span style="color:red">*</span></label>
                        <select name="hocky" id="hocky" class="form-control" required>
                            <option value="1">Một</option>
                            <option value="2">Hai</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="namhoc">Năm học <span style="color:red">*</span></label>
                        <input type="number" class="form-control" name="namhoc" id="namhoc" placeholder="" required>
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
<div class="modal fade" id="EditDiem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-edit    "></i> Sửa/cập nhật điểm</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">




                <input type="hidden" name="idEdit" id="idEdit" value="" class="form-control">





                <div class="form-row">


                    <div class="form-group col-md-12">
                        <label for="masv_diemrenEdit">Sinh viên <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="masv_diemrenEdit" id="masv_diemrenEdit" placeholder="" readonly>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="diemEdit">Điểm <span style="color:red">*</span></label>
                        <input type="number" class="form-control" name="diemEdit" id="diemEdit" placeholder="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="hockyEdit">Học kỳ <span style="color:red">*</span></label>
                        <select name="hockyEdit" id="hockyEdit" class="form-control" required>
                            <option value="1">Một</option>
                            <option value="2">Hai</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="namhocEdit">Năm học <span style="color:red">*</span></label>
                        <input type="number" class="form-control" name="namhocEdit" id="namhocEdit" placeholder="" required>
                    </div>


                </div>




            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Huỷ</button>
                <!-- <button class="btn btn-secondary" type="reset"> <i class="fa fa-retweet" aria-hidden="true"></i> Nhập lại</button> -->
                <button class="btn btn-success" type="submit" name="Edit"><i class="fas fa-edit    "></i> Sửa</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Character Modal-->
<div class="modal fade" id="DeleteDiem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fa fa-recycle" aria-hidden="true"></i> Xoá</h5>
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
                        <label for="">Bạn muốn xoá điểm của đoàn viên</label>
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
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-plus"></i> Thêm danh sách điểm rèn</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>



            <div class="modal-footer">
                <form method="POST" enctype="multipart/form-data">
                    <!-- <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button> -->
                    <input class="btn btn-success" type="file" name="file">
                    <button class="btn btn-success" type="submit" name="Up">Upload</button>
                </form>
            </div>
        </form>
    </div>
</div>
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
                        <label for="">Bạn muốn xoá tất cả điểm rèn ?</label>

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