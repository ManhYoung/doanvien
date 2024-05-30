

<?php


function getTenSinhVien($id)
{
    //=================Chapter====================//
    $sql = "select hoten from thongtindoanvien where masv = '$id'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

require('config.php');
include_once('../danhmuc/danhmucdiemrenluyen/function.php');
$s_c = '';


mysqli_set_charset($conn, 'utf8');
if (isset($_POST["id"])) {



    $ajaxlop = getTenSinhVien($_POST["id"]);


    while ($row_thongtin = mysqli_fetch_array($ajaxlop)) {

        $s_c = $row_thongtin['hoten'];
    }
    if ($s_c != null) {
        echo "Bạn muốn rút sổ đoàn của đoàn viên ".$s_c;
    } else {
        echo "Không tồn tại sinh viên";
    }
}
?>