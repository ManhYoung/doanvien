<?php


function getSoDoan_Full()
{

    $sql = "SELECT sd.masv, sd.trangthai, sd.ghichu, dv.hoten, dv.malop, l.tenlop FROM 
    sodoan sd
    LEFT JOIN thongtindoanvien dv ON sd.masv = dv.masv
    LEFT JOIN lop l on l.malop = dv.malop ";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function getSoDoan_TheoLop($malop)
{
    if ($malop == "all") {
        $sql = "SELECT sd.masv, sd.trangthai, sd.ghichu, dv.hoten, dv.malop, l.tenlop FROM 
        sodoan sd
        LEFT JOIN thongtindoanvien dv ON sd.masv = dv.masv
        LEFT JOIN lop l on l.malop = dv.malop ";
    } else {
        $sql = "SELECT sd.masv, sd.trangthai, sd.ghichu, dv.hoten, dv.malop, l.tenlop FROM 
        sodoan sd
        LEFT JOIN thongtindoanvien dv ON sd.masv = dv.masv
        LEFT JOIN lop l on l.malop = dv.malop 
        WHERE l.malop = '$malop'";
    }
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
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


function insertSoDoan($masv, $tt, $gc)
{

    $sql = "INSERT INTO `sodoan`(`masv`, `trangthai`, `ghichu`) VALUES ('$masv','$tt','$gc')";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}





function updateSoDoan($masv, $tt, $gc)
{

    $sql = "UPDATE `sodoan` SET`trangthai`='$tt',`ghichu`='$gc' WHERE `masv`= '$masv'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function deleteSoDoan($id)
{

    $sql = "DELETE FROM `sodoan` WHERE masv = $id";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
function deletesd()
{

    $sql = "DELETE FROM `sodoan`";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
}
