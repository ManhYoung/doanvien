

<?php
include_once('function.php');
require_once('config.php');
$s_c = '';


mysqli_set_charset($conn, 'utf8');
if (isset($_POST["id"])) { //NẾU LẤY ĐC GIÁ TRỊ ID THÌ..

    $ajaxlop = getDoanVien_TheoLop($_POST["id"]); //BIEN AJAX= KẾT QUẢ TRẢ VỀ CỦA HÀM GETDOANVIEN_THEOLOP(MÃ LỚP)


    while ($row_thongtin = mysqli_fetch_array($ajaxlop)) { //
        //cong dồn TỪNG DÒNG TRONG BẢNG
        $s_c .= "
       <tr>
         <td>{masv}</td>
          <td><a href='index.php?p=quanlydoanvien&id={masv}'>{hoten}</a></td>
             <td>{ngaysinh}</td>
           <td>{gioitinh}</td>
       <td>{diachi}</td>
          <td class='{malop}'>{tenlop}</td>
        </tr>
        
        ";


        //thay the CÁC TỪ TRONG NGOẶC NHỌN {} THANH GIA' TRI CU THE

        $s_c = str_replace("{masv}", $row_thongtin['masv'], $s_c);
        $s_c = str_replace("{hoten}", $row_thongtin['hoten'], $s_c);
        $s_c = str_replace("{ngaysinh}", $row_thongtin['ngaysinh'], $s_c);
        $s_c = str_replace("{gioitinh}", $row_thongtin['gioitinh'], $s_c);
        $s_c = str_replace("{diachi}", $row_thongtin['diachi'], $s_c);
        $s_c = str_replace("{tenlop}", $row_thongtin['tenlop'], $s_c);
        $s_c = str_replace("{malop}", $row_thongtin['malop'], $s_c);
    }

    //bang khac null in bang ra nguoc lai in ra ktt kq
    if ($s_c != null) {
        echo $s_c;
    } else {
        echo "<td valign='top' colspan='7' class='dataTables_empty'>Không tìm thấy kết quả</td>";
    }
}
?>