<?php

//==================Character====================//
function insertCharacter($masv, $hoten, $ngaysinh, $gioitinh, $diachi, $malop, $path)
{
    $sql = "INSERT INTO `thongtindoanvien`(`masv`, `hoten`, `ngaysinh`, `gioitinh`, `diachi`, `malop`, `anh`) VALUES ('$masv', '$hoten', '$ngaysinh', '$gioitinh', '$diachi', '$malop', '$path')";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
    //thêm dữ liệu vào table thông tin đoàn viên
}
function insertDoanPhi($masv, $sotien, $ngaythu, $trangthai)
{
    $sql = "INSERT INTO `doanphi`(`masv`, `sotien`, `ngaythu`, `trangthai`) VALUES ('$masv', '$sotien', '$ngaythu', '$trangthai')";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
    //thêm dữ liệu vào table thông tin đoàn viên
}

function updateCharacter($id, $ht, $ns, $gt, $dc, $l)
{
    $sql = "UPDATE `thongtindoanvien` 
    SET 
    `hoten`= '$ht'
    ,`ngaysinh`='$ns'
    ,`gioitinh`='$gt'
    ,`diachi`='$dc'
    ,`malop`='$l'
    WHERE `masv`='$id'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
    //sửa thông tin đoàn viên
}

function updateCharacter_Anh($id, $ht, $ns, $gt, $dc, $l, $path)
{
    $sql = "UPDATE `thongtindoanvien` 
    SET 
    `hoten`= '$ht'
    ,`ngaysinh`='$ns'
    ,`gioitinh`='$gt'
    ,`diachi`='$dc'
    ,`malop`='$l'
    ,`anh` = '$path'
    WHERE `masv`='$id'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
    //update thông tin đoàn viên bao gồm cả file ảnh 
}
function deleteCharacter($id)
{
    $sql = "DELETE FROM `thongtindoanvien` WHERE `masv` = $id";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
} // xóa thông tin đoàn viên theo mã sinh viên
function delete()
{
    $sql = "DELETE FROM `thongtindoanvien`";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
}




function getDoanVien_Lop()
{
    $sql = "SELECT masv, hoten, ngaysinh, gioitinh, diachi, thongtindoanvien.malop, tenlop FROM `thongtindoanvien`, `lop` WHERE thongtindoanvien.malop = lop.malop";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
    //truy vấn csdl để lấy thông tin đoàn viên theo lớp
}
// function getDoanVien()
// {
//     $sql = "SELECT * FROM `thongtindoanvien`";
//     $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
//     mysqli_set_charset($conn, 'utf8');
//     return mysqli_query($conn, $sql);
//     //truy vấn csdl để lấy thông tin đoàn viên theo lớp
// }


function getDoanVien_TheoLop($malop)
{
    if ($malop == "all") {

        $sql = "SELECT masv, hoten, ngaysinh, gioitinh, diachi, thongtindoanvien.malop, tenlop FROM `thongtindoanvien`, `lop` WHERE thongtindoanvien.malop = lop.malop";
    } else {
        $sql = "SELECT masv, hoten, ngaysinh, gioitinh, diachi, thongtindoanvien.malop, tenlop FROM `thongtindoanvien`, `lop` WHERE thongtindoanvien.malop = lop.malop and lop.malop = '$malop'";
    }
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
    // truy vấn csdl để lấy thông tin đoàn viên theo mã lớp 
}


function getAllLop()
{
    $sql = "SELECT * FROM `lop`";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
    //truy vấn csdl lấy thông tin của lớp
}

function getmasv()
{
    $sql = "SELECT masv FROM `thongtindoanvien`";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}











//=================Mics===================//
function alert($string)
{
    echo "<script>alert('$string')</script>";
}
function notifySuccess($string)
{
    echo "<script>$.notify('$string', 'success');</script>";
}
function notifyFail($string)
{
    echo "<script>$.notify('$string', 'error');</script>";
}
function isExist($id)
{
    $sql = "select * from thongtindoanvien where masv = '$id'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $sql);
    if (!$result || mysqli_num_rows($result) == 0) {
        return false;
    } else {
        return true;
    }
}
function isExistRela($id01, $id02)
{
    $sql = "select * from relationship where char1 = $id01 and char2 = $id02 or char1 = $id02 and char2 = $id01";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $sql);
    if (!$result || mysqli_num_rows($result) == 0) {
        return false;
    } else {
        return true;
    }
}


function insertYeuCau($masv)
{
    $sql = "INSERT INTO `yeucautaikhoan`( `masv`, `ngayyeucau`, `trangthai`) VALUES ('$masv',NOW(),'Đã gửi yêu cầu')";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
}

function isExistDoanVien($id)
{
    $sql = "select * from thongtindoanvien where masv = '$id'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $sql);
    if (!$result || mysqli_num_rows($result) == 0) {
        return false;
    } else {
        return true;
    }
}

function isExistDoanVien_YeuCau($id)
{
    $sql = "select * from yeucautaikhoan where masv = $id";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    $result = mysqli_query($conn, $sql);
    if (!$result || mysqli_num_rows($result) == 0) {
        return false;
    } else {
        return true;
    }
}


function getThongTinDoanVienChiTiet($masv)
{
    $sql = "SELECT thongtindoanvien.masv
    , `hoten`
    , `ngaysinh`
    , `gioitinh`
    , `diachi`
    , lop.`malop`
    , lop.tenlop
    , sodoan.trangthai
    ,anh
    FROM `thongtindoanvien` 
    LEFT JOIN lop on lop.malop = thongtindoanvien.malop
    LEFT JOIN sodoan on sodoan.masv = thongtindoanvien.masv
    
    WHERE thongtindoanvien.masv = '$masv'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function getThongTinDoanVien_DoanPhi($id)
{
    $sql = "SELECT  `sotien`, `ngaythu`, `trangthai` FROM `doanphi` 
    WHERE masv = '$id'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function getThongTinDoanVien_DiemRenLuyen($id)
{
    $sql = "SELECT `diem`, `namhoc`, `hocky` FROM `diemrenluyen`
    WHERE masv = '$id'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
