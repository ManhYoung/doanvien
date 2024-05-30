<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = "";
}

if ($id != "") {
    require_once('pages/thongtindoanvienbyid.php');
} else {
    require_once('danhmucdoanvien.php');
}
