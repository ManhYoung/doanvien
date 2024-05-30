<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn có chắc muốn <a style="color: red">đăng Xuất</a> chứ!!!!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Quay lại</button>
                <a class="btn btn-primary" href="logout.php">Thoát</a>
            </div>
        </div>
    </div>
</div>


<!--  Character Modal-->
<div class="modal fade" id="YeuCauModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fa fa-recycle" aria-hidden="true"></i> Yêu cầu rút sổ đoàn</h5>
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
                        <label for=""></label>
                        <u><strong><label for="" id="nameRut"></label></strong></u>

                    </div>

                </div>





            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Huỷ</button>

                <button class="btn btn-success" type="submit" name="accept"> <i class="fa fa-recycle" aria-hidden="true"></i> Đồng ý</button>
            </div>
        </form>
    </div>
</div>