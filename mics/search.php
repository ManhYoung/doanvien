<?php
include_once('config.php');
//neu tồn tại biến term từ gửi sang
if (isset($_GET['term'])) {
    //lay từ khóa cần tìm kiếm
    $key = $_GET['term'];

    //cau hinh thong tin ket noi CSDL
    //Kết nối tới csdl

    //Lựa chọn csdl và cho phép hiển thị mã utf8



    //cau lenh truy van tim kiem voi tu khoa
    $req = "SELECT * FROM thongtindoanvien WHERE masv LIKE %'" . $key . "'% ";

    $query_search = mysqli_query($conn, $req);

    while ($row_ss = mysqli_fetch_array($query_search)) {
        $results[] = array('label' => $row_ss['masv']);
    }
    //trả về dữ liệu dạng json
    echo json_encode($results);
}
