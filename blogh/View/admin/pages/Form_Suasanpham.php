<?php
	$id = $_GET['pro_id'];


	
	$conn = mysqli_connect("localhost","root","","danguitar");

	mysqli_query($conn,"SET danguitar 'utf8'");
	$sql = "Select * from `tbl_product` where `pro_id` = '$id' ";
	$kq = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($kq))
		{
			$id = $row["pro_id"];
			$ten = $row['pro_name'];
			$loai = $row['cat_id'];
			$gia = $row['price'];
			$anh = $row['image'];
			$mota = $row['description'];
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="image/avt.ico" />
		<title>Thêm thông tin sản phẩm !!! Chào mừng bạn đến với của hàng chúng tôi . Rất vui khi được đồng hành cùng bạn . Các tùy chọn dịch vụ: Mua sắm tại cửa hàng · Nhận hàng ngay nơi bạn ở · Giao hàng nhanh uy tín .</title>
		<style type="text/css">
			body{
				width:100%;
				margin: auto;
				background: url(../../../anh/themsp1.jpg);
			}
			#chu-chay{
				width: 100%;
				color:#C0C0C0;
				font-size: 25px;
				font-weight: bold;
				background: white;
				margin-top: -3.4px;
				text-align: center;	
			}
			#main{
				width:auto;
			}
			#main form{
				margin-left: 730px;
				margin-top: 100px;
			}
		</style>
	</head>
	<body>
		<div id="chu-chay">
			<marquee>Sửa sản phẩm! Chào mừng bạn đến với của hàng chúng tôi . Rất vui khi được đồng hành cùng bạn . Các tùy chọn dịch vụ: Mua sắm tại cửa hàng · Nhận hàng ngay nơi bạn ở · Giao hàng nhanh uy tín .</marquee>
		</div>
		<div id="main">
			<form action="../../../Controller/admin/Suasanpham.php" method="post" >
				<table border="1px" style="width: 600px;height: 550px;">
					<tr>
						<th style="background :#D8BFD8">
							Pro_ID : 
						</th>
						<th>
							<input type="text" name="id" style="width: 97%;height: 90%;"value="<?php echo $id ?>" readonly><br>
						</th>
					</tr>
					<tr>
						<th style="background :#D8BFD8">
							Tên : 
						</th>
						<th>
							<input type="text" name="ten" style="width: 97%;height: 90%;"><br>
						</th>
					</tr>
					<tr>
						<th style="background :#D8BFD8">
							Loại SP: 
						</th>
						<th>
							<input type="text" name="loai"style="width: 97%;height: 90%;"><br>
						</th>
					</tr>
					<tr>
						<th style="background :#D8BFD8">
							Giá SP : 
						</th>
						<th>
							<input type="text" name="gia"style="width: 97%;height: 90%;"><br>
						</th>
					</tr>
					<tr>
						<th style="background :#D8BFD8">
							Ảnh : 
						</th>
						<th>
							<input type="text" name="anh"style="width: 97%;height: 90%;">							
						</th>
					</tr>
					<tr>
						<th style="background :#D8BFD8">
							Mô tả : 
						</th>
						<th>
							<input type="text" name="mota"style="width: 97%;height: 90%;">							
						</th>
					</tr>
					<tr>
						<th>
							<input type="submit" name="them" style="width: 97%;height: 90%;background:#FFE4E1 ;font-size: 15px;" value="Sửa">
						</th>
						<th>
							<button style="width: 97%;height: 90%;background:#FFE4E1 ;font-size: 15px;">
								<a href='Sanpham.php' title='Quay lại'>Quay lại</a> 
							</button>
						</th>
					</tr>
				</table>
			</form>
		</div>
		<div class="Menu">
			

			<?php
				$conn = mysqli_connect("localhost","root","","danguitar");
				mysqli_query($conn,"SET danguitar 'utf8'");
	                //tạo chuỗi sql
				$sql1 = "SELECT * FROM tbl_category";
	                //Thực hiện query truy vấn
				$kq1=mysqli_query($conn,$sql1);
			?>

			<ul>
				<h3> Danh sách loại Sản Phẩm: </h3>
				<?php
				$j=0;
				while(($row1 = mysqli_fetch_array($kq1))&&($j<10))
					{   $j++;
						?>
						<li>
							<a style="font-size: 20px; text-decoration: none;" href="">
								<?php
								echo $row1['cat_id'];
								echo "---";
								 echo $row1['cat_name'];
								?>
							</a>
						</li>
						<?php           
					}
					?>
				</ul>
		</div>
	</body>
</html>