<?php
if (isset($_GET["id"])) { //chon phuong thuc GET lay id dang hien thi len thanh tim kiem
    $id = $_GET["id"]; //neu co ton tai id thi tao bien $id=$get, 
} else {
    include_once('404.php'); //neu k co do lai trang 404
}
if (isExist($id)) { //neu id co ton tai trong csdl thi thi hien len trang thong tin, ng lai 404
    include_once('thongtin.php');
} else {
    include_once('404.php');
}
