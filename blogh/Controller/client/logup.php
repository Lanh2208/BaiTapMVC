<!doctype html>
<html>
<head>
	
</head>
<body>
	<?php
		$level = $_POST['level'];
		$u = isset($_POST['username']) ? $_POST['username'] : "";
		$p = isset($_POST['password']) ? $_POST['password'] : "";

		$conn = mysqli_connect("localhost","root","","danguitar");

		mysqli_query($conn,"SET danguitar 'utf8'");
	    	$sql1 = "insert into tbl_users(userName,passWord,level) values('$u', '$p', '0') ";

	    	$kq1 = mysqli_query($conn, $sql1);

			if( $kq1)
			{
				header("location: ../../view/client/login.php");
			}else
			{ header("location: ../../view/client/index.php");
		}
	?>
</body>
</html>