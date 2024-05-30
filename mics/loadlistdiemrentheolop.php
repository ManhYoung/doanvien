

<?php

require('config.php');
include_once('../danhmuc/danhmucdiemrenluyen/function.php');
$s_c = '';


mysqli_set_charset($conn, 'utf8');
if (isset($_POST["id"])) {

    $ajaxlop = getDiemRen_TheoLop($_POST["id"]);


    while ($row_thongtin = mysqli_fetch_array($ajaxlop)) {

        $s_c .= "
        <tr>
        <td class='{iddiemrenluyen}' name='{iddiemrenluyen}'><a href='index.php?p=quanlydoanvien&id={masv}'>{masv}</a></td>
        <td><a href='index.php?p=quanlydoanvien&id={masv}'>{hoten}</a></td>
        <td>{diem}</td>
       
        <td>{hocky}</td>
        <td>{namhoc}</td>
        <td class='{malop}'>{tenlop}</td>
        </tr>
        
        ";




        $s_c = str_replace("{iddiemrenluyen}", $row_thongtin['iddiemrenluyen'], $s_c);
        $s_c = str_replace("{masv}", $row_thongtin['masv'], $s_c);
        $s_c = str_replace("{diem}", $row_thongtin['diem'], $s_c);
        $s_c = str_replace("{hoten}", $row_thongtin['hoten'], $s_c);
        $s_c = str_replace("{namhoc}", $row_thongtin['namhoc'], $s_c);
        $s_c = str_replace("{hocky}", $row_thongtin['hocky'], $s_c);
        $s_c = str_replace("{tenlop}", $row_thongtin['tenlop'], $s_c);
        $s_c = str_replace("{malop}", $row_thongtin['malop'], $s_c);
    }
    if ($s_c != null) {
        echo $s_c;
    } else {
        echo "<td valign='top' colspan='7' class='dataTables_empty'>Không tìm thấy kết quả</td>";
    }
}
?>