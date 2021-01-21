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
<form action="?options=addtuyenxe" method="post">
<input type="submit" class="button" name="insert" value="Thêm"  />
</form>
  <table class="table table-bordered" style="width:930px;font-size: 15px; margin-top: 15px;">
    
      <tr>
        <th>Route ID</th>
        <th>Name</th>
        <th>Start Time</th>
		<th>End Time</th>
        <th>Fare</th>
		<th>Route Lenght</th>
        <th>Number Of Route</th>
		<th></th>
      </tr>
      <?php
		include 'config.php'; 
		$query = "select * from route_description ";
		$result = mysqli_query($conn, $query);
		
		while ($row = mysqli_fetch_array($result))
		{
			$GLOBALS['idmarker']=$row['routeId'];
			echo "
			<tr> 
			<td>$row[routeId]</td>
			<td><a href='listmarker.php?id=$row[routeId]'>$row[name]</a></td>
			<td>$row[startTime]</td>
			<td>$row[endTime]</td>
			<td>$row[fare]</td>
			<td>$row[routeLenght]</td>
			<td>$row[numberOfRoute]</td>
			<td><a href='updatetuyenxe.php?id=$row[routeId]'>Sửa</a>||<a href='deletetuyenxe.php?id=$row[routeId]' style='color: red'>Xóa</a></td>
			</tr>";
		}
	  ?>
    
  </table>
</div>

</body>
</html>
