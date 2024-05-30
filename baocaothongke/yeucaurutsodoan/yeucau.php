<!-- DataTales Example -->
<?php
include_once('baocaothongke/yeucaurutsodoan/function.php');
if (isset($_POST['btnDuyet'])) {
    $id = $_POST['idDuyet'];
    notifySuccess("Duyệt thành công!");
    Duyet($id);
}
if (isset($_POST['btnkoDuyet'])) {
    $id = $_POST['idkoDuyet'];
    notifySuccess("Không duyệt thành công!");
    koDuyet($id);
}
include_once('baocaothongke/yeucaurutsodoan/modals.php');

?>
<h3 class="m-0 font-weight-bold text-primary">Yêu cầu rút sổ đoàn của sinh viên (danh sách chờ duyệt)</h3>
<div class="card shadow mb-4">
    <div class="card-header py-3">

        <a class="btn btn-warning float-right" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#dskoDuyetModal">
            <i class="fa fa-times" aria-hidden="true"></i>
            Danh sách không duyệt
        </a>
        <a class="btn btn-success float-right" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#dsDuyetModal">
            <i class="fa fa-check" aria-hidden="true"></i>
            Danh sách đã duyệt
        </a>

    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataYC" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">Mã sinh viên</th>
                        <th class="text-center">Họ tên</th>
                        <th class="text-center">Lớp</th>
                        <th class="text-center">Ngày yêu cầu</th>
                        <th class="text-center">Trạng thái</th>

                    </tr>
                </thead>

                <tbody id="show_list_yeucau">

                    <?php
                    $list = getYeuCau();
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
<script src="baocaothongke/yeucaurutsodoan/script.js">

</script>