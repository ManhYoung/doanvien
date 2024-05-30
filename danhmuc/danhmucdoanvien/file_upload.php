<?php
include_once('mics/config.php');
include_once('mics/function.php');

echo $Up=$_FILES['Up']['name'];
require 'PHPExcel/Classes/upload.php';
require_once 'PHPExcel/Classes/PHPExcel/upload.php';
?>