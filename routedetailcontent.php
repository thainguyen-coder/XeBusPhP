	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>

	</head>
	<body>
		<div id="tt">
		<form id="detail">
			<span><h4>Thông tin</h4></span> <br>
			<span><b><i> Mã tuyến:</i></b>

				<?php 
				
				include 'config.php';
				$id = isset($_GET['id']) ? $_GET['id'] : '';
								//cau len sql 
				$query = "select * from route_description where routeId = '$id' ";
								//xu li cau lenh sql
				$result = mysqli_query($conn, $query);
				if($row = mysqli_fetch_array($result))
				{
					echo $row['routeId'];
				}
				
				?>
			</span> <br>
			<span><b><i>Tên tuyến:</i></b>
				<?php 
				
				include 'config.php';
				$id = isset($_GET['id']) ? $_GET['id'] : '';
								//cau len sql 
				$query = "select * from route_description where routeId = '$id' ";
								//xu li cau lenh sql
				$result = mysqli_query($conn, $query);
				if($row = mysqli_fetch_array($result))
				{
					echo $row['name'];
				}
				
				?>
			</span> <br>
			<span><b><i>Lượt đi:</i></b><br>
				<?php 
				
				include 'config.php';
				$id = isset($_GET['id']) ? $_GET['id'] : '';
								//cau len sql 
				$query = "select * from route_setting where routeId = '$id' order by id  ";
								//xu li cau lenh sql
				$result = mysqli_query($conn, $query);
				while($row = mysqli_fetch_array($result))
				{
					echo $row['name']. "--";
				}
				
				?>
			</span> <br>
		
			<ul>
				<li><b><i>Thời gian hoạt động:</i></b>

					<?php 
					
					include 'config.php';
					$id = isset($_GET['id']) ? $_GET['id'] : '';
								//cau len sql 
					$query = "select * from route_description where routeId = '$id' ";
								//xu li cau lenh sql
					$result = mysqli_query($conn, $query);
					if($row = mysqli_fetch_array($result))
					{
						echo $row['startTime']."--". $row['endTime'];
					}
					
					?>
				</li>
				<li><b><i>Giá vé:</i></b>

					<?php 
					
					include 'config.php';
					$id = isset($_GET['id']) ? $_GET['id'] : '';
								//cau len sql 
					$query = "select * from route_description where routeId = '$id' ";
								//xu li cau lenh sql
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result))
					{
						echo $row['fare'];
					}
					
					?>
				</li>
				<li><b><i>Độ dài tuyến: </i></b>
					
					<?php 
					
					include 'config.php';
					$id = isset($_GET['id']) ? $_GET['id'] : '';
									//cau len sql 
					$query = "select * from route_description where routeId = '$id' ";
									//xu li cau lenh sql
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result))
					{
						echo $row['routeLenght']."km";
					}
					
					?>
					
				</li>
				<li><b><i>Số chuyến:</i></b>
					
					<?php 
					
					include 'config.php';
					$id = isset($_GET['id']) ? $_GET['id'] : '';
									//cau len sql 
					$query = "select * from route_description where routeId = '$id' ";
									//xu li cau lenh sql
					$result = mysqli_query($conn, $query);
					while($row = mysqli_fetch_array($result))
					{
						echo $row['numberOfRoute'];
					}
					
					?>
				</li>
				
			</ul>
		</form>
	</div>

	</body>
	</html>