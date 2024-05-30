<?php
$database = "qldv";
$user = "root";
$pass = "";
$host = "localhost";

$conn = mysqli_connect($host, $user, $pass, $database) or die("Can't connect to database: '$database'");
mysqli_query($conn, "SET NAMES 'UTF8'");
