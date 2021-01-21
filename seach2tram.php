<!DOCTYPE html>
<html>
<head>
	<title>QUY NHON MAP</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="stylesearch.css">
</head>
	<body style="background:#EEEEEE">
		<form action="?options=search" class="seach" method="POST">
				<label for="gsearch">Tìm kiếm trạm</label>
				<input type="search" id="seach" name="search">
				<input type="submit" value="Tìm" name="submit">
					</form>
	</div>
	<div id="divResult" class="x" style="height: auto !important;">
	<div align="right">
	<form action="?options=search2" class="seach" method="POST">
				<label for="gsearch">Tìm kiếm 2 trạm</label></br>
				<input type="search"  name="search1"></br>
				<input type="search"  name="search2"></br>
				<input type="submit" value="Tìm" name="submit" style="margin-right:60px">
					</form>
	</div>
	</div>
</body>
</html>
		<form id="form" action="" method="POST" align="center">
			<li>
			
				<!--<th width="300px" align="center"> Mã tuyến</th> -->
				<h3> Tên tuyến</h3>
				<table class="table" >
						<?php 
						include "config.php";
						if(isset($_POST["submit"]))
							{
								$keyword = $_POST["search1"];
								$keyword1 = $_POST["search2"];
								$sql ="select routeId from route_setting where name LIKE '$keyword%' GROUP BY routeId";
								$result=mysqli_query($conn,$sql);
								while($row=mysqli_fetch_array($result))
								{
									$sql2="select * from route_setting where routeId='$row[routeId]'";
									$result2=mysqli_query($conn,$sql2);
									while($row2=mysqli_fetch_array($result2)){
										if($row2['name']==$keyword1)
										{
											$sql3="select * from route_description where routeId='$row[routeId]'";
											$result3=mysqli_query($conn,$sql3);
											while($row3=mysqli_fetch_array($result3))
											{
												?>
												<tr>
									
									<td><a href="routedetail.php?id=<?php echo $row3['routeId'];?>" ><?php echo $row3['name']; ?></a></td>
										</tr>
										<?php
											}}}}
							}
					
							
												
						?>
				</table>
				<?php
				echo "</br><a href='?options=thongtin'>Hủy tìm</a>";
				?>
			</li>
		</form>
