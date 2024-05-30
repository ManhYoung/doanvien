<?php

function getYeuCau()
{
    $sql = "select  yc.masv
    ,yc.ngayyeucau
    ,yc.trangthai
    ,yc.idyeucau
    ,dv.hoten
    ,dv.malop
    ,l.tenlop
    from yeucautaikhoan yc
    LEFT JOIN thongtindoanvien dv on dv.masv = yc.masv
    LEFT JOIN lop l on l.malop = dv.malop
    where trangthai = 'Đã gửi yêu cầu'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function getYeuCau_Duyet()
{
    $sql = "select  yc.masv
    ,yc.ngayyeucau
    ,yc.trangthai
    ,yc.idyeucau
    ,dv.hoten
    ,dv.malop
    ,l.tenlop
    from yeucautaikhoan yc
    LEFT JOIN thongtindoanvien dv on dv.masv = yc.masv
    LEFT JOIN lop l on l.malop = dv.malop
    where trangthai = 'Đã được duyệt'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function getYeuCau_KhongDuyet()
{
    $sql = "select  yc.masv
    ,yc.ngayyeucau
    ,yc.trangthai
    ,yc.idyeucau
    ,dv.hoten
    ,dv.malop
    ,l.tenlop
    from yeucautaikhoan yc
    LEFT JOIN thongtindoanvien dv on dv.masv = yc.masv
    LEFT JOIN lop l on l.malop = dv.malop
    where trangthai = 'Không duyệt'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function Duyet($id)
{
    $sql = "UPDATE `yeucautaikhoan` SET `trangthai`= 'Đã được duyệt' WHERE idyeucau = $id";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
function koDuyet($id)
{
    $sql = "UPDATE `yeucautaikhoan` SET `trangthai`= 'Không duyệt' WHERE idyeucau = $id";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
