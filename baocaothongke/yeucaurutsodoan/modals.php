<div class="modal fade" id="DuyetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fa fa-check" aria-hidden="true"></i> Duyệt</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group align-content-center">


                    <input type="hidden" name="idDuyet" id="idDuyet" value="" class="form-control">

                </div>



                <div class="form-row">
                    <div class="form-group">
                        <label for="">Xác nhận duyệt</label>
                        <u><strong><label for="" id="nameDuyet"></label></strong></u>?

                    </div>

                </div>





            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Huỷ</button>

                <button class="btn btn-success" type="submit" name="btnDuyet"> <i class="fa fa-check" aria-hidden="true"></i> Duyệt</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="koDuyetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fa fa-times" aria-hidden="true"></i> Không duyệt</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group align-content-center">


                    <input type="hidden" name="idkoDuyet" id="idkoDuyet" value="" class="form-control">

                </div>



                <div class="form-row">
                    <div class="form-group">
                        <label for="">Xác nhận không duyệt</label>
                        <u><strong><label for="" id="namekoDuyet"></label></strong></u>?

                    </div>

                </div>





            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Huỷ</button>

                <button class="btn btn-danger" type="submit" name="btnkoDuyet"> <i class="fa fa-times" aria-hidden="true"></i> Không duyệt</button>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="dskoDuyetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fa fa-times" aria-hidden="true"></i> Danh sách không được duyệt</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataYC_KoDuyet" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Mã sinh viên</th>
                                    <th class="text-center">Họ tên</th>
                                    <th class="text-center">Lớp</th>
                                    <th class="text-center">Ngày yêu cầu</th>
                                    <th class="text-center">Trạng thái</th>

                                </tr>
                            </thead>

                            <tbody id="show_list_yeucau_koduyet">

                                <?php
                                $list = getYeuCau_KhongDuyet();
                                while ($row_list = mysqli_fetch_array($list)) {
                                    ob_start();
                                ?>
                                    <tr>
                                        <td id-data='{idyeucau}'>{masv}</td>
                                        <td><a href="index.php?p=quanlydoanvien&id={masv}">{hoten}</a></td>
                                        <td>{tenlop}</td>
                                        <td>{ngayyeucau}</td>
                                        <td>{trangthai}</td>

                                    </tr>
                                <?php
                                    $s = ob_get_clean();
                                    $s = str_replace("{masv}", $row_list['masv'], $s);
                                    $s = str_replace("{tenlop}", $row_list['tenlop'], $s);
                                    $s = str_replace("{idyeucau}", $row_list['idyeucau'], $s);
                                    $s = str_replace("{hoten}", $row_list['hoten'], $s);

                                    $s = str_replace("{ngayyeucau}", $row_list['ngayyeucau'], $s);
                                    $s = str_replace("{trangthai}", $row_list['trangthai'], $s);

                                    echo $s;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>




            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Đóng</button>


            </div>
        </form>
    </div>
</div>



<div class="modal fade" id="dsDuyetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fa fa-check" aria-hidden="true"></i> Đã duyệt</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataYC_KoDuyet" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Mã sinh viên</th>
                                    <th class="text-center">Họ tên</th>
                                    <th class="text-center">Lớp</th>
                                    <th class="text-center">Ngày yêu cầu</th>
                                    <th class="text-center">Trạng thái</th>

                                </tr>
                            </thead>

                            <tbody id="show_list_yeucau_duyet">

                                <?php
                                $list = getYeuCau_Duyet();
                                while ($row_list = mysqli_fetch_array($list)) {
                                    ob_start();
                                ?>
                                    <tr>
                                        <td id-data='{idyeucau}'>{masv}</td>
                                        <td><a href="index.php?p=quanlydoanvien&id={masv}">{hoten}</a></td>
                                        <td>{tenlop}</td>
                                        <td>{ngayyeucau}</td>
                                        <td>{trangthai}</td>

                                    </tr>
                                <?php
                                    $s = ob_get_clean();
                                    $s = str_replace("{masv}", $row_list['masv'], $s);
                                    $s = str_replace("{tenlop}", $row_list['tenlop'], $s);
                                    $s = str_replace("{idyeucau}", $row_list['idyeucau'], $s);
                                    $s = str_replace("{hoten}", $row_list['hoten'], $s);

                                    $s = str_replace("{ngayyeucau}", $row_list['ngayyeucau'], $s);
                                    $s = str_replace("{trangthai}", $row_list['trangthai'], $s);

                                    echo $s;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>




            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Đóng</button>
            </div>
        </form>
    </div>
</div>