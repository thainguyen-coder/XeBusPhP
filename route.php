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
<style type="text/css">
	
	
	li{
		float: left;
	}

		
		#form li{
			list-style: none;
		}
	.table{
		border=2px  ;
		align=center;
		width: 120%;
		line-height: 185%;
		background: #a1f7ef;
		border-style: groove;
		text-align: initial;
		padding: 8%;
		margin-left:-10%;
		
	}
	h3{
		font-size:250%;
	}
	.seach{
		padding-top:10px;
	}
	</style>
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
		<div>
		<form id="form" action="route_detail.php" method="GET" align="center">
			<li>
				<h3> Tên tuyến</h3>
				<table class="table" >
					<?php 
					include 'config.php';
					$query = "select * from route_description order by routeId ";
					$result = mysqli_query($conn, $query);
					while ($row = mysqli_fetch_array($result)) { ?>
					<tr>
						<td><a href="routedetail.php?id=<?php echo $row['routeId'];?>" ><?php echo $row ['name']; ?></a></td>
					</tr>
					<?php }
					?>
				</table>
			</li>
		</form>
		</div>
	</div>
</div>
</div>
      
</body>
</html>


