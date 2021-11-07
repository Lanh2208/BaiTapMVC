<?php
	$id = $_POST["id"];
	$ten = $_POST['ten'];
	$loai = $_POST['loai'];
	$gia = $_POST['gia'];
	$anh = $_POST['anh'];
	$mota = $_POST['mota'];

	
	$conn = mysqli_connect("localhost","root","","danguitar");

	mysqli_query($conn,"SET danguitar 'utf8'");
	$sql = "insert into tbl_product(`pro_id`, `pro_name`, `cat_id`, `price`, `image`, `description`) values('$id','$ten','$loai', '$gia', '$anh', '$mota') ";

	$kq = mysqli_query($conn, $sql);

	if($kq )
	{
		header("location: ../../View/admin/pages/Sanpham.php");
	} else {echo "Check lại ID và Loại SP!!";}
?>