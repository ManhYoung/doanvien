<!-- Add Modal-->
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

            $sotien = $sheetData[$row]['B'];
            $ngaythu = $sheetData[$row]['C'];
            $trangthai = $sheetData[$row]['D'];

            insertDoanPhi($masv, $sotien, $ngaythu, $trangthai);
        }
    } catch (Exception $e) {
        notifyFail('Yêu cầu nhập file!');
    }
}
?>
<div class="modal fade" id="AddLop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"> <i class="fas fa-plus"> Thêm </i></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label for="masv">Sinh viên <span style="color: red">*</span></label>
                        <select name="masv" id="masv" class="form-control">
                            <option value="chuachon">-- Chọn sinh viên --</option>
                            <?php
                            $cbxlop = getDoanVien_SoDoan();
                            while ($row_clop = mysqli_fetch_array($cbxlop)) {
                            ?>
                                <option value="<?php echo $row_clop['masv'] ?>"> <?php echo $row_clop['hoten'] ?> - <?php echo $row_clop['tenlop'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="sotien">Số tiền <span style="color: red">*</span></label>
                        <input type="number" class="form-control" name="sotien" id="sotien" placeholder="" required>
                    </div>
                    <div class="form-group col-md-7">
                        <label for="ngaythu">Ngày thu <span style="color: red">*</span></label>
                        <input type="date" class="form-control" name="ngaythu" id="ngaythu" placeholder="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="trangthai">Trạng thái <span style="color: red">*</span></label>
                        <select name="trangthai" id="trangthai" class="form-control">
                            <option value="Đã hoàn thành">Đã hoàn thành</option>
                            <option value="Chưa hoàn thành">Chưa hoàn thành</option>
                        </select>
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
<!-- Edit Modal-->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-edit    "></i> Sửa đoàn phí</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">




                <input type="hidden" name="idEdit" id="idEdit" value="" class="form-control">





                <div class="form-row">


                    <div class="form-group col-md-12">
                        <label for="masv_Edit">Đoàn viên <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="masv_Edit" id="masv_Edit" placeholder="" readonly>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="sotien_edit">Số tiền <span style="color: red">*</span></label>
                        <input type="number" class="form-control" name="sotien_edit" id="sotien_edit" placeholder="" required>
                    </div>
                    <div class="form-group col-md-7">
                        <label for="ngaythu_edit">Ngày thu <span style="color: red">*</span></label>
                        <input type="date" class="form-control" name="ngaythu_edit" id="ngaythu_edit" placeholder="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="trangthai_edit">Trạng thái <span style="color: red">*</span></label>
                        <select name="trangthai_edit" id="trangthai_edit" class="form-control">
                            <option value="Đã hoàn thành">Đã hoàn thành</option>
                            <option value="Chưa hoàn thành">Chưa hoàn thành</option>
                        </select>
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

<!--Xóa lớp -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="">Bạn muốn xoá đoàn phí của đoàn viên</label>
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
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-plus"></i> Thêm danh sách đoàn phí</h5>
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
                        <label for="">Bạn muốn xoá tất cả đoàn phí ?</label>

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