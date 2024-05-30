<?php

function getDoanPhi()
{
    $sql = "select  * from doanphi
    left join thongtindoanvien on doanphi.masv = thongtindoanvien.masv";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function  addDoanPhi($masv, $sotien, $ngaythu, $trangthai)
{
    $sql = "INSERT INTO `doanphi`( `masv`, `sotien`, `ngaythu`, `trangthai`) VALUES ('$masv',$sotien,'$ngaythu','$trangthai')";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
function  updateDoanPhi($iddoanphi, $sotien, $ngaythu, $trangthai)
{
    $sql = "UPDATE `doanphi` SET `sotien`=$sotien,`ngaythu`='$ngaythu',`trangthai` = '$trangthai' WHERE  `iddoanphi`= $iddoanphi";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');

    return mysqli_query($conn, $sql);
}

function deleteDoanPhi($id)
{
    $sql = "DELETE FROM `doanphi` WHERE iddoanphi = $id";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
function deletedp()
{
    $sql = "DELETE FROM `doanphi`";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
}
function getDoanVien_SoDoan()
{
    $sql = "SELECT * FROM `thongtindoanvien` 
    LEFT JOIN lop on thongtindoanvien.malop = lop.malop
    WHERE thongtindoanvien.masv NOT IN (SELECT masv FROM sodoan)";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
