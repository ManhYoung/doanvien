

<?php

require('config.php');
include_once('../danhmuc/danhmucsodoan/function.php');
$s_c = '';


mysqli_set_charset($conn, 'utf8');
if (isset($_POST["id"])) { // NẾU CÓ ID THÌ



    $ajaxlop = getSoDoan_TheoLop($_POST["id"]); // BIẾN AJAXLOP = GETSODOAN_THEOLOP(1CTTXXX);


    while ($row_thongtin = mysqli_fetch_array($ajaxlop)) { //duyệt thông tin từng dòng của mảng
        //bien s_c gán cho tr(hàg)
        $s_c .= "
        <tr>

                            <!-- <td name='{iddiemrenluyen}' class='{iddiemrenluyen}'><a href='index.php?p=quanlydoanvien&id={masv}'>{masv}</a></td> -->
                            <td>{masv}</td>
                            <td><a href='index.php?p=quanlydoanvien&id={masv}'>{hoten}</a></td>
                            <td>{trangthai}</td>
                            <td class='{malop}'>{tenlop}</td>
                            <td>{ghichu}</td>


                        </tr>
        
        ";




        $s_c = str_replace("{masv}", $row_thongtin['masv'], $s_c);

        $s_c = str_replace("{hoten}", $row_thongtin['hoten'], $s_c);
        $s_c = str_replace("{trangthai}", $row_thongtin['trangthai'], $s_c);
        $s_c = str_replace("{tenlop}", $row_thongtin['tenlop'], $s_c);
        $s_c = str_replace("{malop}", $row_thongtin['malop'], $s_c);
        $s_c = str_replace("{ghichu}", $row_thongtin['ghichu'], $s_c);
    }
    //TẠO RA TỪNG DÒNG TRONG BẢNG
    if ($s_c != null) {
        echo $s_c; //TRẢ VỀ CÁC DÒNG KẾT QUẢ
    } else {
        echo "<td valign='top' colspan='7' class='dataTables_empty'>Không tìm thấy kết quả</td>";
        //TRẢ VỀ CÂU "K TÌM THẤY KQ" NẾU NHƯ K TRUY VẤN ĐC
    }
}
?>