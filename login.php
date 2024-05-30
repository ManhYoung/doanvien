<?php

session_start(); //hàm dùng để phục hồi dữ liệu session đã có, nếu chưa có thì sẽ tạo ra 1 session mới 
include_once('mics/config.php');
include_once('mics/function.php');
if (isset($_POST["login"])) {
    // lấy thông tin người dùng
    $username = $_POST["username"];
    $password = $_POST["password"];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username); // 
    $username = addslashes($username); // lấy giá trị và chuyển về dạng chuỗi
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" || $password == "") {
        alert("Tài khoản hoặc mật khẩu bạn không được để trống!");
    } else {
        $sql = "select * from taikhoan where tentaikhoan = '$username' and matkhau = '$password' ";
        $query = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows == 0) {
            alert('Sai tài khoản hoặc mật khẩu');
        } else {
            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
            $_SESSION['username'] = $username;
            $row = mysqli_fetch_array($query);
            $_SESSION['ten'] = $row['ten'];
            

            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            header('Location: index.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="css\style_login.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <section class="login-block">
        <div class="container">
            <div class="row">

                <div class="col-md-8 banner-sec">
                    <div class="banner-text" >
                        
                    </div>

                </div>
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Đăng nhập</h2>
                    <form class="login-form" action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Tên tài khoản</label>
                            <input type="text" name="username" class="form-control" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                        </div>


                        <div class="form-check">
                            <label class="form-check-label">
                                <a href="">Quên mật khẩu</a>
                            </label>
                            <button type="submit" name="login" class="btn btn-login float-right">Đăng nhập</button>
                        </div>
                    </form>

                </div>
                <div class="col-md-12 login-block">
                    <div class="copy-text">Copyright © 2020 Học viện Công nghệ Bưu chính Viễn thông </div>
                    <div class="copy-text"> Quản trị viên: <a href="https://www.facebook.com/manhhh.19", style="color: #FFFF00"> Nguyen Duy Manh
                        </a> || Page <a href="https://www.facebook.com/DoanThanhNienHVCNBCVT"style="color: #FFFF00">Doan Thanh Nien HVCNBCVT</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>