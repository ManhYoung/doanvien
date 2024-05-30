<?php
include_once('mics/config.php');
include_once('mics/function.php');







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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <br>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-coffee"></i>
        </div> -->


                <div class="sidebar-brand-icon">
                    <img src="img/logo.png" width="70%" height="70%" alt="" srcset="">
                </div>
                <div class="sidebar-brand-text mx-3">QLDV <sup>PTIT</sup></div>
            </a>
            <br>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search something..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-info" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
-->
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Xin chào!</span>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" data-toggle="modal" href="#" data-target="#InfoModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thông tin VTYC
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cài đặt
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Hoạt động đăng nhập
                                </a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6">
                        <h1>YÊU CẦU RÚT SỔ ĐOÀN</h1>
                    </div>
                    <?php
                    if (isset($_POST["accept"])) {
                        $masv = $_POST['idDel'];
                        if (isExistDoanVien($masv)) {
                            if (!isExistDoanVien_YeuCau($masv)) {
                                notifySuccess("Gửi yêu cầu thành công!");
                                insertYeuCau($masv);
                                
                            } else {
                                notifyFail("Đã tồn tại yêu cầu rút sổ đoàn!");
                                
                            }
                        } else if (isExistDoanVien($masv) == false) {
                            notifyFail("Mã sinh viên không tồn tại!");
                            
                        }
                    }
                    ?>
                    <!-- Begin Page Content -->

                    <form action="" method="post" class="container-fluid">
                        <script type="text/javascript">
                            $(document).ready(function() {
                                //sử dụng autocomplete với input có id = key
                                $("input#masinhvien").autocomplete({
                                    source: 'mics/search.php', //link xử lý dữ liệu tìm kiếm
                                })
                            });
                        </script>
                        <div class="form-row">
                            <div class="form-group col-md-3"></div>
                            <div class="form-group col-md-6">
                                <label for="masinhvien">Nhập mã sinh viên <span style="color:red">*</span></label>
                                <input type="textr" class="form-control" name="masinhvien" id="masinhvien" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5"></div>
                            <div class="form-group col-md-2">
                                <a class="btn btn-info" style="margin-left: 10px" data-toggle="modal" href="#" data-target="#YeuCauModal" id="btnRutsodoan">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    Gửi yêu cầu
                                </a>
                            </div>
                        </div>

                    </form>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br><br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <?php include_once('blocks/footer.php'); ?>

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- thêm Modal -->

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