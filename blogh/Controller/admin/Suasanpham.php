<?php
	$id = $_POST["id"];
	$ten = $_POST['ten'];
	$loai = $_POST['loai'];
	$gia = $_POST['gia'];
	$anh = $_POST['anh'];
	$mota = $_POST['mota'];

	
	$conn = mysqli_connect("localhost","root","","danguitar");

	mysqli_query($conn,"SET danguitar 'utf8'");
	$sql = "UPDATE `tbl_product` SET `pro_name`='$ten',`cat_id`='$loai',`price`='$gia',`image`='$anh',`description`='$mota' WHERE `pro_id`='$id'";

	$kq = mysqli_query($conn, $sql);

	if($kq )
	{
		header("location: ../../View/admin/pages/Sanpham.php");
	}
?>