<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="image/avt.ico" />
    <style type="text/css">
            body
        {font-family: "Helvetica Neue", Helvetica, Arial;
           padding-top: 20px;
          background: url(../../anh/login.jpg);
          background-size: cover;
         
        }
        .dangnhap {
            margin-top: 30px;
            border-radius: 1px;
            box-shadow: 0px 0px 0px 8px rgba(0,0,0,0.3);   
        }
        #chu-chay{
            width: auto;
            margin-right: 150px;
            margin-left: 150px;
                color:#C0C0C0;
            font-size: 20px;
            font-weight: bold;
            background: white;
            margin-top: -3.4px;
            text-align: center;
        }
        #main{
            width: 1200px;
            height: 600px;
        }
        #main form{
            margin-left: 680px;
            margin-top: 80px;
        }
        .footer{
          text-align: center;
          color: black;
          margin-bottom: 20px;
        }
        .tendangnhap{
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
    <div class="tendangnhap">
        Đăng nhập 
    </div>
    <div id="main">
        <form action='login.php' class="dangnhap" method='POST'> 
            <table style="width: 500px;height: 200px;background: #ffffff; "border="1px" solid #ccc align="center">
                <tr>
                    <td style="color:#000000">
                        Tên đăng nhập:
                    </td>
                    <td>
                        <input style="width: 97%;height: 75%; background:#DCDCDC;" type='text' name='username' /> 
                    </td>
                </tr>
                <tr>
                    <td  style="color:#000000">
                        Mật khẩu : 
                    </td>
                    <td>
                        <input style="width: 97%;height: 75%; background:#DCDCDC;"  type='password' name='password'/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button style="width: 99%;height: 100%;background:#90EE90 ">
                            <a  href='logup.php' title='Đăng ký'>Đăng ký</a> 
                        </button>
                    </td>
                    <td>
                        <input style="width:99%;height:100%;background :#D8BFD8 ;" type='submit' class="button" name="dangnhap"  value='Đăng nhập' /> 
                    </td>
                    
                </tr>
               <?php require '../../Controller/client/xuly_dangnhap.php';?> 
            </table>
        <form> 
    </div>
     <div class="footer">
      Copyright © 2020 Wpthemesgrid - All Rights Reserved hihi
      Mọi thông tin liên hệ :01256789
    </div>
</body>
</html>