

<?php
include_once('function.php');
require_once('config.php');
$s = "<option value='all'>Tất cả</option>";


mysqli_set_charset($conn, 'utf8');
if (isset($_POST["id"])) {

    $ajaxlop = getAllLop_byDV($_POST["id"]);


    while ($row_thongtin = mysqli_fetch_array($ajaxlop)) {

        $s .= "
        
       
            <option value='{malop}'>{tenlop}</option>
       
        ";
        $s = str_replace("{malop}", $row_thongtin['malop'], $s);
        $s = str_replace("{tenlop}", $row_thongtin['tenlop'], $s);
    }
    if ($s != null) {
        echo $s;
    } else {
        //echo "<td valign='top' colspan='6' class='dataTables_empty'>Không tìm thấy kết quả</td>";
    }
}
?>