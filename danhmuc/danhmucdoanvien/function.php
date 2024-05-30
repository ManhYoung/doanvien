<?php
function getAllLop_byDV($iddv)
{
    $sql = "SELECT * FROM `lop` where iddonvi = $iddv   ";
    $conn = mysqli_connect("localhost", "root", "", "qldv") or die("Can't connect to database: 'qldv'");
    mysqli_set_charset($conn, 'utf8');
    return mysqli_query($conn, $sql);
}
