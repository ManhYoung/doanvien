<?php

function getLop()
{
    $sql = "SELECT  * from lop";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function addLop($id, $ten)
{
    $sql = "INSERT INTO `lop`(`malop`, `tenlop`) VALUES ('$id', '$ten')";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
function updateLop($malop, $tenlop)
{
    $sql = "UPDATE `lop` SET `tenlop`='$tenlop' WHERE malop = '$malop'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}

function DeleteLop($id)
{
    $sql = "DELETE FROM `lop` WHERE malop = '$id'";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
