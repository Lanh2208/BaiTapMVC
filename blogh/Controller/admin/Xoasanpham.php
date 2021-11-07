<?php
	$Id = $_GET['pro_id'];

	$conn = mysqli_connect("localhost","root","","danguitar");

	mysqli_query($conn,"SET danguitar 'utf8'");



	$sql = "DELETE FROM `tbl_product` WHERE `tbl_product`.`pro_id` = '$Id'";

	$kq = mysqli_query($conn, $sql);

	if($kq)
	{
		header("location: ../../View/admin/pages/Sanpham.php");
	}else{echo "Lỗi";}
?>