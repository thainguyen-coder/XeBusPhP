<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
  background-color: #008CBA;
}
</style>
<body>

<div class="container" align="left" >        
<h2 style="margin-left:300px;">Danh sách tuyến xe</h2>
<?php 
	$GLOBALS['idtuyen']=$id = isset($_GET['id']) ? $_GET['id'] : '';
	$url="addmarker.php?id=".$GLOBALS['idtuyen'];
	echo "<form action='$url' method='post'>
<input type='submit' class='button' name='insert' value='Thêm'  />";
echo "<a href='admin?options=listcontact' style='margin-left:580px;font-size:18px'>Danh sách trạm</a>";
	?>
</form>
  <table class="table table-bordered" style="width:930px;font-size: 15px; margin-top: 15px;">
    
      <tr style="text-align:center;">
		<th>ID</th>
        <th>Route ID</th>
        <th>Name</th>
        <th>Latitude Center</th>
		<th>Longitude Center</th>
		<th></th>
      </tr>
      <?php
		include 'config.php'; 
		$id = isset($_GET['id']) ? $_GET['id'] : '';
		$query = "select * from route_setting where routeId = '$id' ";
		$result = mysqli_query($conn, $query);
		$i=1;
		while ($row = mysqli_fetch_array($result))
		{
			echo "<tr> 
			<td>$i</td>
			<td>$row[routeId]</td>
			<td>$row[name]</td>
			<td>$row[latitudeCenter]</td>
			<td>$row[longitudeCenter]</td>
			<td><a href='updatemarker.php?id=$row[routeId]'>Sửa</a>||<a href='deletemarker.php?id=$row[id]' style='color: red'>Xóa</a></td>
			</tr>";
			$i++;
		}
	  ?>
  </table>
</div>

</body>
</html>
