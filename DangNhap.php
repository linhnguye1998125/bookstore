<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Dang nhap he thong</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style  type="text/css">
body{
	overflow: hidden;
}
.container {
	width: 70%;
	margin: auto;
	text-align: center;
}
/* Định dạng phần form đăng nhập*/
.fomrgroup {
	width: 50%;
	margin: auto;
	display: block;
	height: 50px;
}
.fomrgroup input {
	float: right;
	width: 70%;
	height: 25px;
	margin-right: 20px;
	line-height: 50px;
}
.fomrgroup b {
	font-size: 20px;
}
/* The Modal (background) */
.modal {
	display: none; /* mặc định được ẩn đi */
	position: fixed; /* vị trí cố định */
	z-index: 1; /* Ưu tiên hiển thị trên cùng */
	padding-top: 100px;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgb(0,0,0);
	background-color: rgba(0,0,0,0.4);
}
/* Modal Content */
.modal-content {
	background-color: #fefefe;
	margin: auto;
	padding: 20px;
	border: 1px solid #888;
	width: 60%;
}
/* The Close Button */
.close {
	color: #aaaaaa;
	float: right;
	font-size: 28px;
	font-weight: bold;
}
.close:hover, .close:focus {
	color: #000;
	text-decoration: none;
	cursor: pointer;
}
#demo {
	animation-duration: 3s;
	animation-delay: .3s;
	animation-iteration-count: 3;
}
input[type=submit].button {
	margin-left: 0.5em;
	height: 2.5em;
	padding: 0.2em 1em 0.2em 2.25em;
	font-size: 3em;
	font-weight: bold;
	font-family: "Open Sans";
	text-transform: uppercase;
	color: #696666;
	background: url(https://i.imgur.com/Th606mh.png) no-repeat scroll 0.75em 0.07em transparent;
	background-size: 54px 204px;
	border-radius: 2em;
	border: 0.15em solid #F9C23C;
	cursor: pointer;
	transition: all 0.3s ease 0s;
}
input[type="submit"]:hover.button {
	color: #fff;
	background-color: #EAA502;
	border-color: #EAA502;
	background-position: 0.75em bottom;
	-webkit-transition: all 0.3s ease;
	-ms-transition: all 0.3s ease;
	transition: all 0.3s ease;
}
input[type="submit"]:focus.button {
	background-position: 2em -4em;
	-webkit-transition: all 0.3s ease;
	-ms-transition: all 0.3s ease;
	transition: all 0.3s ease;
}
/* Webfonts */

@font-face {
	font-family: 'Open Sans';
	font-style: normal;
	font-weight: 700;
	src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://themes.googleusercontent.com/static/fonts/opensans/v8/k3k702ZOKiLJc3WVjuplzHhCUOGz7vYGh680lGh-uXM.woff) format('woff');
}
input.dangnhap {
    line-height: 50%;
	color:green;
}
</style>
</head>
<body style="text-align:center">
<?php

	if (isset($_POST["btnDangNhap"])) {
		include_once( "DataProvider.php" );
		session_start();
		$tenDangNhap = $_POST[ "txtTenDangNhap" ];
		$matKhau = $_POST[ "txtMatKhau" ];
		if ( $tenDangNhap == "" || $matKhau == "" ) {
		
			 echo '<script>alert("Khong duoc de trong");</script>';
		} else {
			//		$sql="SELECT * FROM dangky WHERE user=BINARY('".$tenDangNhap."') AND pass=BINARY('".$matKhau."')";
			//		$ketqua= DataProvider::ExecuteQuery($sql);
			//		$record=mysqli_fetch_array($ketqua);
			$ketQuaDangNhap = false;

			$dsNguoiDung = DataProvider::ExecuteQuery( "Select * From dangky" );
			if ( $dsNguoiDung != false ) {
				while ( $row = mysqli_fetch_array( $dsNguoiDung ) ) {
					if ( $tenDangNhap == $row[ "user" ] &&
						$matKhau == $row[ "pass" ] ) {
						$ketQuaDangNhap = true;
					}
				}
			}
			if ($ketQuaDangNhap ==  true	 ) {
			
				 echo '<script>alert("Dang nhap thanh cong");</script>';
				 $_SESSION['name'] = $_POST['txtTenDangNhap'];
				  header('Location: Ketquadangnhap.php');
			} else {
	
				 echo '<script>alert("Dang nhap that bai");</script>';
			}
		}

	}
	?>
<div >
		<?php
         include("./Menu.php");
        ?>
</div>
<div class="container">
  <h2  class="animated heartBeat bounce">Chào Mừng các bạn đã đến với Trang quản lý Sách của tôi.</h2>
  <!-- Button đăng nhập để mở form đăng nhập -->
  
  <input value="Đăng nhập" class="button" id="myBtn" type="submit" />
  <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Nội dung form đăng nhập -->
    <div class="modal-content">
      <form name="formDangnhap" method="post" action="">
        <span class="close">&times;</span>
        <h2  class="animated fadeInRightBig bounce">Đăng nhập</h2>
        <div class="fomrgroup"><b>UserName:</b>
          <input type="text" name="txtTenDangNhap" id="txtTenDangNhap" />
        </div>
        <div class="fomrgroup"><b>PassWord:</b>
          <input type="password" name="txtMatKhau" id="txtMatKhau"/>
        </div>
        <div class="fomrgroup">
          <input type="submit" class="dangnhap"  name="btnDangNhap" value="Đăng nhập"/>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
    // lấy phần Modal
    var modal = document.getElementById('myModal');
  
    // Lấy phần button mở Modal
    var btn = document.getElementById("myBtn");
  
    // Lấy phần span đóng Modal
    var span = document.getElementsByClassName("close")[0];
  
    // Khi button được click thi mở Modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
  
    // Khi span được click thì đóng Modal
    span.onclick = function() {
        modal.style.display = "none";
    }
  
    // Khi click ngoài Modal thì đóng Modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>

</body>
</html>