<?php


function getDiemRenLuyen_Full() //truy vấn csdl 
{

    $sql = "SELECT drl.iddiemrenluyen
    ,drl.masv
    ,drl.diem
    ,drl.namhoc
    ,drl.hocky
    ,tt.hoten
    ,tt.malop
    ,l.tenlop
    FROM diemrenluyen drl
    LEFT JOIN thongtindoanvien tt on drl.masv = tt.masv
    LEFT JOIN lop l on tt.malop = l.malop";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function getDiemRen_TheoLop($malop) //truy vấn csdl theo mã lớp 
{
    if ($malop == "all") {
        $sql = "SELECT drl.iddiemrenluyen
        ,drl.masv
        ,drl.diem
        ,drl.namhoc
        ,drl.hocky
        ,tt.hoten
        ,tt.malop
        ,l.tenlop
        FROM diemrenluyen drl
        LEFT JOIN thongtindoanvien tt on drl.masv = tt.masv
        LEFT JOIN lop l on tt.malop = l.malop";
    } else {
        $sql = "SELECT drl.iddiemrenluyen
        ,drl.masv
        ,drl.diem
        ,drl.namhoc
        ,drl.hocky
        ,tt.hoten
        ,tt.malop
        ,l.tenlop
        FROM diemrenluyen drl
        LEFT JOIN thongtindoanvien tt on drl.masv = tt.masv
        LEFT JOIN lop l on tt.malop = l.malop
        WHERE l.malop = '$malop'";
    }
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function getDiemRen_TheoLop_Hocky($malop, $hocky) // truy vấn theo mã lớp và học kỳ
{
    if ($malop == "all" && $hocky == 0) {
        $sql = "SELECT drl.iddiemrenluyen
        ,drl.masv
        ,drl.diem
        ,drl.namhoc
        ,drl.hocky
        ,tt.hoten
        ,tt.malop
        ,l.tenlop
        FROM diemrenluyen drl
        LEFT JOIN thongtindoanvien tt on drl.masv = tt.masv
        LEFT JOIN lop l on tt.malop = l.malop";
    } else  if ($malop == "all" && $hocky != 0) {
        $sql = "SELECT drl.iddiemrenluyen
        ,drl.masv
        ,drl.diem
        ,drl.namhoc
        ,drl.hocky
        ,tt.hoten
        ,tt.malop
        ,l.tenlop
        FROM diemrenluyen drl
        LEFT JOIN thongtindoanvien tt on drl.masv = tt.masv
        LEFT JOIN lop l on tt.malop = l.malop
        WHERE  drl.hocky = $hocky";
    } else  if ($malop != "all" && $hocky == 0) {
        $sql = "SELECT drl.iddiemrenluyen
        ,drl.masv
        ,drl.diem
        ,drl.namhoc
        ,drl.hocky
        ,tt.hoten
        ,tt.malop
        ,l.tenlop
        FROM diemrenluyen drl
        LEFT JOIN thongtindoanvien tt on drl.masv = tt.masv
        LEFT JOIN lop l on tt.malop = l.malop
        WHERE  l.malop = '$malop'";
    } else {
        $sql = "SELECT drl.iddiemrenluyen
        ,drl.masv
        ,drl.diem
        ,drl.namhoc
        ,drl.hocky
        ,tt.hoten
        ,tt.malop
        ,l.tenlop
        FROM diemrenluyen drl
        LEFT JOIN thongtindoanvien tt on drl.masv = tt.masv
        LEFT JOIN lop l on tt.malop = l.malop
        WHERE l.malop = '$malop' and drl.hocky = $hocky";
    }
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
function getSinhVien_nam_hk($namhoc, $hocky) //hàm để lấy thông tin của sinh viên theo mã lớp
{
    $sql = "SELECT drl.iddiemrenluyen
        ,drl.masv
        ,drl.diem
        ,drl.namhoc
        ,drl.hocky
        ,tt.hoten
        ,tt.malop
        ,l.tenlop
        FROM diemrenluyen drl
        LEFT JOIN thongtindoanvien tt on drl.masv = tt.masv
        LEFT JOIN lop l on tt.malop = l.malop
        WHERE drl.namhoc = '$namhoc' and drl.hocky = $hocky";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}


function getSinhVien_TheoLop($malop) //hàm để lấy thông tin của sinh viên theo mã lớp
{
    // $sql = "SELECT * FROM `thongtindoanvien` 
    // WHERE malop = '$malop' and masv NOT IN (SELECT masv FROM diemrenluyen)";
    $sql = "select * from thongtindoanvien WHERE malop = '$malop'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}


function insertDiemRenLuyen($masv, $diem, $namhoc, $hocky) // hàm thêm điểm rèn
{

    $sql = "INSERT INTO `diemrenluyen`(`iddiemrenluyen`, `masv`, `diem`, `namhoc`, `hocky`) VALUES (NULL,'$masv',$diem,$namhoc,$hocky)";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}





function updateDiemRenLuyen($id, $diem, $namhoc, $hocky) // hàm sửa điểm
{

    $sql = "
    UPDATE `diemrenluyen` 
    SET 
    `diem`= $diem
    ,`namhoc`= $namhoc
    ,`hocky`= $hocky 
    WHERE `iddiemrenluyen`= $id
    ";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function deleteDiemRenLuyen($id) //hàm xóa 
{

    $sql = "
   delete from diemrenluyen where iddiemrenluyen = $id
    ";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
function deletedr() //hàm xóa 
{

    $sql = "
   delete from diemrenluyen
    ";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
}
