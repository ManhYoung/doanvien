

<?php

require('config.php');
include_once('../danhmuc/danhmucdiemrenluyen/function.php');
$s_c = '';


mysqli_set_charset($conn, 'utf8');
if (isset($_POST["id"])) {

    $ajaxlop = getSinhVien_TheoLop($_POST["id"]);


    while ($row_thongtin = mysqli_fetch_array($ajaxlop)) {

        $s_c .= "
        <option value='{masv}'>{masv} - {hoten}</option>
        
        ";





        $s_c = str_replace("{masv}", $row_thongtin['masv'], $s_c);

        $s_c = str_replace("{hoten}", $row_thongtin['hoten'], $s_c);
    }
    if ($s_c != null) {
        echo $s_c;
    } else {
        echo "<td valign='top' colspan='7' class='dataTables_empty'>Không tìm thấy kết quả</td>";
    }
}
?>