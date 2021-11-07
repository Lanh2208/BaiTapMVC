<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Đăng ký</title>
	<link rel="shortcut icon" href="image/avt.ico" />
	<style type="text/css">
		   body
        {font-family: "Helvetica Neue", Helvetica, Arial;
           padding-top: 20px;
          background: url(../../anh/login.jpg);
          background-size: cover;
        }
		.dangky {
			margin-top: 30px;
			 border-radius: 1px;
            box-shadow: 0px 0px 0px 8px rgba(0,0,0,0.3);   
		}
		#chu-chay{
			width: 1300px;
			margin-left: 350px;
			color:#C0C0C0;
			font-size: 20px;
			font-weight: bold;
			background: white;
			margin-top: -3.4px;
			text-align: center;
		}
		#main{
			width: 1024px;
			height: 500px;
		}
		#main form{
			margin-left: 720px;
			margin-top: 280px;
		}
		 .footer{
          text-align: center;
          color: white;
          margin-bottom: 20px;
        }
        .tendangky{
        	  margin-top: 30px;
            text-align: center;
            color:black;
            font-size:30px;
        }
	</style>
</head>
<body>
	<div id="chu-chay">
		<marquee>Chào mừng bạn đến với của hàng chúng tôi . Rất vui khi được đồng hành cùng bạn . Các tùy chọn dịch vụ: Mua sắm tại cửa hàng · Nhận hàng ngay nơi bạn ở · Giao hàng nhanh uy tín .</marquee>
	</div>
	<div class="tendangky">
		Đăng Ký
	</div>
	<div id="main">
		<form action="../../Controller/client/logup.php" class="dangky" method="post" >
			<table style="width:500px;height:200px; ; background:#FFFFFF;" border="1px"  align="center" >
				<!-- <tr style="al" >
					<h1>Đăng Ký</h1>
				</tr> -->
				<tr>
					<th style="color:#000000">
						Nhập tên : 
					</th>
					<th>
						<input  style="width: 97%;height: 75%; background:#DCDCDC;"  type="text" name="username"><br>
					</th>
				</tr>
				<tr>
					<th style="color:#000000">
						Mật khẩu: 
					</th>
					<th>
						<input  style="width: 97%;height: 75%; background:#DCDCDC;" type="text" name="password"><br>
					</th>
				</tr>
				<tr>
					<th style="color:#000000">
						Cấp độ :
					</th>
					<th>
						<input  style="width: 97%;height: 75%; background:#DCDCDC;" type="text" name="level" value="0" readonly> <br>
					</th>
				</tr>
				<tr>
					<th>
						<button>
							<a   style="width: 97%, height:75%" href='login.php' title='Quay lại'>Quay lại</a> 
						</button>
					</th>
					<th>
						<input  style="width: 99%; height: 90%; background:#FFDAB9;" type="submit" value="Đăng ký">
					</th>
				
				</tr>
			</table>
		</form>
	</div>
	 <div class="footer">
      Copyright © 2020 Wpthemesgrid - All Rights Reserved hihi
      Mọi thông tin liên hệ :01256789
    </div>
</body>
</html>