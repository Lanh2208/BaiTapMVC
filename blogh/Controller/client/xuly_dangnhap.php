<?php

session_start();
if (isset($_POST['dangnhap'])) {
$_SESSION['test'] = $_POST['username'];
}

$u = isset($_POST['username']) ? $_POST['username'] : "";
$p = isset($_POST['password']) ? $_POST['password'] : "";

$conn = mysqli_connect("localhost","root","","danguitar");

mysqli_query($conn,"SET danguitar 'utf8'");


	$sql = "select userName, password, level from tbl_users where userName ='$u' and password = '$p'";
	$kq = mysqli_query($conn,$sql);



	$num_rows = mysqli_num_rows($kq);
	$rs = mysqli_fetch_array($kq);
	if (!$u || !$p ) {
		echo "Bạn đang để trống tài khoản hoặc mật khẩu!";
	}
	else{
		if ($num_rows==0) {
			echo "Tên đăng nhập hoặc mật khẩu không đúng !";
		}
		else if($num_rows)
		{
			if($rs['level'] == 1){
				header("location: ../admin/index.php");
				 echo "<script>alert('Vui lòng đăng nhập lại')</script>";
			}
			else if($rs['level'] == 0){
				header("location:../client/index.php");
				 echo "<script>alert('Vui lòng')</script>";
			}
			else{
				echo "Lỗi đăng nhập!";
			}
		}
	}
?>