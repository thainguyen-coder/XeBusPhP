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
	<div id="main">
		<div class="portalName">
			Hỗ trợ người đi xe buýt<br>tại TP.QUY NHƠN 
		</div>
		<div id="menutop">
			<ul>
				<li><a href="?options=trangchu">Trang chủ</a></li>
				<li><a href="?options=gioithieu">Giới thiệu</a></li>
				<li><a href="?options=thongtin">Thông tin tuyến</a></li>
				<li><a href="?options=phananh">Phản ánh</a></li>
				
			</ul>
		</div>
		
		
		<div id="maincontent">
			<div id="content">
				<?php
					$options = isset($_GET['options']) ? $_GET['options'] : null;
					switch ($options ) {
						case 'trangchu':
							include "home.php";
							break;
						case 'gioithieu':
							include "about.php";
							break;
						case 'thongtin':
							include "route.php";
							break;
						case 'phananh':
							include "feedback.php";
							break;
						case 'hotro':
							include "help.php";
							break;
						case 'search':
							include "routeseach.php";
							break;
						case 'search2':
							include "seach2tram.php";
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