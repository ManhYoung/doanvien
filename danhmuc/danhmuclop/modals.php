<!-- Add Modal-->

<div class="modal fade" id="AddLop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"> <i class="fas fa-plus"> Thêm lớp </i></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Mã lớp <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="malop" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="">Tên lớp <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="tenlop" placeholder="" required>
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
<div class="modal fade" id="EditLop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fas fa-edit    "></i> Sửa lớp</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">




                <input type="hidden" name="idEdit" id="idEdit" value="" class="form-control">





                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Tên lớp <span style="color: red">*</span></label>
                        <input type="text" class="form-control" id="tenEdit" name="tenEdit" placeholder="" required>
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

<!--Xóa lớp -->

<div class="modal fade" id="DelLop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="POST" action="">
            <div class="modal-header">
                <h5 class="modal-title text-success font-weight-bold" id="exampleModalLabel"><i class="fa fa-recycle" aria-hidden="true"></i> Xoá lớp</h5>
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
                        <label for="">Bạn muốn xoá lớp</label>
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