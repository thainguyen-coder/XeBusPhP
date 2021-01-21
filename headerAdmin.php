<?php 
 session_start();
 if($_SESSION['username'])
 {
 }else
 header("location:login.php")
 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Xe Buýt TP Quy Nhơn</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background: rgba(2,200,255,1);">
	<div class="EasyDNNSkin_NewsTwo">
	<div class="NewsTwoBackgroundGradient" style="height: auto !important;">
		<div class="NewsTwoMain" style="height: auto !important;">
	<div class="header" >
        <div class="like" ><a href="#logo" alt="khoacntt"><img  width="90px" src="./images/img.png"></a></div> 
	<div id="main"><!--khung trang web -->
		<div class="portalName"><!-- phan banner -->
			Hỗ trợ người đi xe buýt<br>tại TP.QUY NHƠN 
		</div>
		<div id="menutop">
			<ul>
				
				<li><a href="?options=trangchu">Trang chủ</a></li>
				<li><a href="?options=thongtin">Thông tin tuyến</a></li>
				<li><a href="?options=listcontact">Quản lý tuyến</a></li>
				<li><a href="?options=viewphananh">Xem phản hồi</a></li>
			</ul>
		</div>
		<?php
		echo "<p style='text-align:right;font-size: 8px'>Xin chào $_SESSION[username] <a href='logout.php' style='text-align:right;font-size: 7px; color:#007BFF'>Logout</a></p>";
		?>
		<div id="maincontent">
			<div id="content">
				<?php
					$options = isset($_GET['options']) ? $_GET['options'] : null;
					$idtuyenxe = isset($_GET['idtuyenxe'])? $_GET['idtuyenxe']: null;
					switch ($options ) {
						case 'trangchu':
							include "home.php";
							break;
						case 'thongtin':
							include "route.php";
							break;
						case 'listcontact':
							include "listcontact.php";
							break;
						case 'viewphananh':
							include "viewfeedback.php";
							break;
						case 'addtuyenxe':
							include "addtuyenxe.php";
		
							break;
						case 'addmarker':
							include "addmarker.php";
		
							break;
						case 'updatetuyenxe':
							include "updatetuyenxe.php";
							break;
						case 'search':
							include "routeseach.php";
							break;
						case 'logout':
							include "logout.php";
							break;
						case 'search2':
							include "seach2tram.php";
							break;
						case 'chitiettuyenxe':
							include "listmarker.php";
							break;
					}
					
				  ?>

			</div>
		</div>
	</div>
</div>
</div>
	</div><!--khung trang web -->
</body>
</html>