<?php
session_start();
include_once('mics/config.php');
include_once('mics/function.php');

// Kiểm tra đăng nhập
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// Xử lý yêu cầu trang con
$page = isset($_GET['p']) ? $_GET['p'] : 'home';
$allowedPages = ['home', 'quanlydoanvien', 'dmdoanphi', 'dmsodoan', 'dmdiemrenluyen', 'dmlop', 'yeucau'];

if (!in_array($page, $allowedPages)) {
    $page = 'home';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý đoàn viên </title>
    <!-- <link rel="stylesheet" type="text/css" href="css\dangnhapStyle.css" /> -->
    <!-- Custom fonts for this template -->

    <!-- auto complete -->
    <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- <script src="assets/js/jquery-3.4.1.min.js"></script> -->


    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- contextMenu -->
    <link href="assets/css/jquery.contextMenu.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- notify include -->
    <script src="assets/js/notify.js"></script>
    <!-- Custom styles for this page -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        /* ul.ui-autocomplete {
            z-index: 1100;
        } */
        .ui-autocomplete {
            position: absolute;
            z-index: 9999;
            cursor: default;
            padding: 0;
            margin-top: 2px;
            list-style: none;
            background-color: #ffffff;
            border: 1px solid #ccc;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .ui-autocomplete>li {
            padding: 3px 20px;
        }

        .ui-autocomplete>li.ui-state-focus {
            background-color: #DDD;
        }

        .ui-helper-hidden-accessible {
            display: none;
        }
    </style>
</head>

<body>
    <style>
        body {
            display: flex;
        }
        #page-layout {
            width: 100%;
        }
    </style>
    <div id="page-top">
        <div id="wrapper">
            <?php include 'blocks/sidebar.php'; ?>
        </div>
    </div>
    <div id="page-layout">
        <div class="page-layout-top">
            <?php include 'blocks/topbar.php'; ?>
        </div>
        
        <div class="container-fluid">
            <?php
            // Load nội dung trang con tương ứng
                switch ($page) {
                    case 'home':
                        include 'trangchu.php';
                        break;
                    case 'quanlydoanvien':
                        include 'danhmuc\danhmucdoanvien\ktradieukien.php';
                        break;
                    case 'dmdoanphi':
                        include 'danhmuc\danhmucdoanphi\danhmucdoanphi.php';
                        break;
                    case 'dmsodoan':
                        include 'danhmuc\danhmucsodoan\danhmucsodoan.php';
                        break;
                    case 'dmdiemrenluyen':
                        include 'danhmuc\danhmucdiemrenluyen\danhmucdiemrenluyen.php';
                        break; 
                    case 'dmlop':
                        include 'danhmuc\danhmuclop\danhmuclop.php';
                        break;
                    case 'yeucau':
                        include 'baocaothongke\yeucaurutsodoan\yeucau.php';   
                        break;            
                }
            ?>
        </div>  
        <?php include 'blocks/footer.php'; ?>           
    </div>
    <?php include_once('blocks/modals.php'); ?>
    <!-- Bootstrap core JavaScript-->
    <!-- <script src="assets/vendor/jquery/jquery.min.js"></script> -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>


    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.contextMenu.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="assets/js/demo/datatables-demo.js"></script>
    <!-- Custom Script -->
    <script src="assets/js/script.js"></script>
</body>
</html>