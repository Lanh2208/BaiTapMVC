<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="image/avt.ico" />
		<title>Quản lý sản phẩm</title>
		<style type="text/css">
			body{
				width: 100%;
				margin: 0px auto;
				
				background: url(../../../anh/anhql.jpg);
               
			}
			#menu-top{
				height: 40px;
				background:#E6E6FA;
				font-size:25px ;

			}
			#menu-top ul li{
				list-style: none;
				float: left;

			}
			#menu-top ul li a{
				text-decoration: none;
				display: block;
				color: #4800FF;

			}
			#menu-top li ul{
				display: none;
				position: absolute;
				height: 20px;
				width: 150px;
			}
			#menu-top li>ul li{
				width: 100%;
				background:#93A7BC ;
				text-align: left;
			}
			#menu-top  li:hover > ul{
			    display:  block;
			    color: red;
			}
			#menu-top .tk{
				margin-top: -19px;
				margin-left: 500px;
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
				width: 1200px;
				height: 600px;
			}
			#main h3{
				margin-left: 600px;
				margin-top: 40px;
			}
			#main table{
				margin-left: 430px;
				margin-top: 30px;
			}
			#xuatex{
				margin-left: 150px;
			}
			#phantranghh{
				margin-left: 600px;
				margin-top: 20px;
			}

		</style>
	</head>
	<body>
		<div id="menu-top">
			<ul>
				<li>
					<a style="margin-top:7px;" href="">
						Quản lý 
					</a>
					<ul>
						<li>
							<a href="Sanpham.php" style="font-size: 18px;">
								Quản lý sản phẩm
							</a>
						</li>
						<li>
							<a href="Thanhvien.php" style="font-size :18px;">
								Quản lý thành viên
							</a>
						</li>
						<li>
							<a href="../index.php" style="font-size:18px;">
								Trang Admin
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<div id="chu-chay">
			<marquee>Chào mừng bạn đến với của hàng chúng tôi . Rất vui khi được đồng hành cùng bạn . Các tùy chọn dịch vụ: Mua sắm tại cửa hàng · Nhận hàng ngay nơi bạn ở · Giao hàng nhanh uy tín .</marquee>
		</div>
		<div id="main">
			<h3 style="margin-left: 750px; font-size: 35px;">Danh sách sản phẩm</h3>
			<table border ="1px" style="width:350px;height: 500px;" >
			 	<tr >
			 		<th >
			 			STT
			 		</th>
			 		<th>
			 			Pro_ID
			 		</th>
			 		<th>
			 			<p style="width: 200px;">
			 				Tên sản phẩm
			 			</p>
			 		</th >
			 		<th>
			 			Loại SP(Cat_ID)
			 		</th>
			 		<th >
			 			Giá
			 		</th>
			 		<th >
			 			Đường dẫn ảnh
			 		</th>
			 		<th  >
			 			<p style="width: 600px;">
			 				Mô tả
			 			</p>
			 		</th>
			 		<th >
			 			<a href ='Form_Themsanpham.php' style="color: white;"> Thêm </a> 
			 		</th>
			 		<th style="color: white;">
			 			Sửa
			 		</th>
			 		<th style="color: white;">
			 			Xóa
			 		</th>
			 	</tr>
			 	<?php 
				 	//require '../../../Model/hienthi.php';
				 	//$a=new Hieu();
				 	//$a->a();
			 	$conn = mysqli_connect("localhost","root","","danguitar");
			 	$kq = mysqli_query($conn, 'select count(pro_id) as total from tbl_product');
			 	$rs = mysqli_fetch_assoc($kq);
			 	$total_records = $rs['total'];

					// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
			 	$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
			 	$limit = 5;

					// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
					// tổng số trang
			 	$total_page = ceil($total_records / $limit);

					// Giới hạn current_page trong khoảng 1 đến total_page
			 	if ($current_page > $total_page){
			 		$current_page = $total_page;
			 	}
			 	else if ($current_page < 1){
			 		$current_page = 1;
			 	}

					// Tìm Start
			 	$start = ($current_page - 1) * $limit;

					// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
					// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
			 	$kq = mysqli_query($conn, "SELECT * FROM tbl_product LIMIT $start, $limit");
			 	$i = 1;
			 	while ($rs = mysqli_fetch_assoc($kq)) {
			 		$id=$rs["pro_id"];
			 		echo "<tr>";
			 		echo "<th>".$i."</td>";
			 		echo "<th>".$rs["pro_id"]."</td>";
			 		echo "<th>".$rs["pro_name"]."</td>";
			 		echo "<th>".$rs["cat_id"]."</td>";
			 		echo "<th>".$rs["price"]."</td>";
			 		echo "<th>".$rs["image"]."</td>";
			 		echo "<th>".$rs["description"]."</td>";
			 		echo "<th> <a href ='Form_Themsanpham.php'> Thêm </a> </td>";
			 		echo "<th> <a href ='Form_Suasanpham.php?pro_id=".$rs['pro_id']."'> Sửa </a></td>";
			 		$id= $rs['pro_id'];
			 		echo "<th> <a href ='../../../Controller/admin/Xoasanpham.php?pro_id=".$rs['pro_id']."'> Xóa </a></td>";
			 		echo "</tr>";
			 		$i++;
			 	}
			 	?>
			</table>
		</div>
		<div id="phantranghh">
			<?php 
				if ($current_page > 1 && $total_page > 1){
					echo '<a href="Sanpham.php?page='.($current_page-1).'">Prev</a> | ';
				}

				// Lặp khoảng giữa
				for ($i = 1; $i <= $total_page; $i++){
			    // Nếu là trang hiện tại thì hiển thị thẻ span
			    // ngược lại hiển thị thẻ a
					if ($i == $current_page){
						echo '<span>'.$i.'</span> | ';
					}
					else{
						echo '<a href="Sanpham.php?page='.$i.'">'.$i.'</a> | ';
					}
				}

				// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
				if ($current_page < $total_page && $total_page > 1){
					echo '<a href="Sanpham.php?page='.($current_page+1).'">Next</a> | ';
				}
			?>			
		</div>
	</body>
</html>