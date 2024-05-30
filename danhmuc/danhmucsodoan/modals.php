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
            $trangthai = $sheetData[$row]['B'];
            $ghichu = $sheetData[$row]['C'];
            insertSoDoan($masv, $trangthai, $ghichu);
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
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-plus"></i> Nhập thông tin</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">


                    <div class="form-group col-md-12">
                        <label for="masv_sodoan">Đoàn viên <span style="color:red">*</span></label>
                        <select name="masv_sodoan" id="masv_sodoan" class="form-control" required>
                            <option value="chuachon">-- Chọn sinh viên --</option>
                            <?php
                            $cbxlop = getDoanVien_SoDoan();
                            while ($row_clop = mysqli_fetch_array($cbxlop)) {
                            ?>
                                <option value="<?php echo $row_clop['masv'] ?>"> <?php echo $row_clop['hoten'] ?> - <?php echo $row_clop['tenlop'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                </div>
                <div class="form-row">


                    <div class="form-group col-md-12">
                        <label for="trangthai">Trạng thái <span style="color:red">*</span></label>
                        <select name="trangthai" id="trangthai" class="form-control" required>
                            <!-- <option value="Chưa rút">Chưa rút</option> -->

                            <!-- <option value="Đã rút">Đã rút</option> -->
                            <!-- <option value="Đang chờ duyệt">Đang chờ duyệt</option> --> -->
                            <option value="Có sổ">Có sổ</option>
                            <option value="Không có sổ">Không có sổ</option>

                        </select>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="ghichu">Ghi chú </label>
                        <input type="text" class="form-control" name="ghichu" id="ghichu" placeholder="">
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
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-edit    "></i> Sửa sổ đoàn</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idEdit" id="idEdit" value="" class="form-control">

                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="masv_SoDoanEdit">Đoàn viên <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="masv_SoDoanEdit" id="masv_SoDoanEdit" placeholder="" readonly>
                    </div>

                </div>

                <div class="form-row">


                    <div class="form-group col-md-12">
                        <label for="trangthai_Edit">Trạng thái <span style="color:red">*</span></label>
                        <select name="trangthai_Edit" id="trangthai_Edit" class="form-control" required>
                            <option value="Chưa rút">Chưa rút</option>

                            <option value="Đã rút">Đã rút</option>
                            <option value="Đang chờ duyệt">Đang chờ duyệt</option>
                            <option value="Không có sổ">Không có sổ</option>
                            <option value="Có sổ">Có sổ</option>
                        </select>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="ghichu_Edit">Ghi chú </label>
                        <input type="text" class="form-control" name="ghichu_Edit" id="ghichu_Edit" placeholder="">
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
                        <label for="">Bạn muốn xoá sổ đoàn của đoàn viên</label>
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
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-plus"></i> Thêm danh sách sổ đoàn</h5>
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
                        <label for="">Bạn muốn xoá tất cả sổ đoàn ?</label>

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