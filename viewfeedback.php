<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xem Phản Hồi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">          
  <table class="table table-bordered" style="width:930px;font-size: 15px; margin-top: 15px;">

      <tr>
        <th>Name</th>
        <th>Email</th>
		<th>Phone</th>
        <th>Message</th>
		<th>Time</th>
      </tr>
      <?php
		include 'config.php'; 
		$query = "select * from feedback ";
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_array($result))
		{
			echo "<tr> 
			<td>$row[Name]</td>
			<td>$row[Email]</td>
			<td>$row[Phone]</td>
			<td>$row[Message]</td>
			<td>$row[Time]</td>
			</tr>";
		}
	  ?>
  </table>
  <form action="deletefeedback.php" method="post">
<input type="submit" class="button" name="insert" value="Xóa tất cả" style="margin-left:450px; background-color:powderblue;" />
<?php
if(isset($_POST["submit"]))
{
		include 'config.php'; 
		$query = "Delete from feedback";
		mysqli_query($conn,$query);
		echo "<script>alert('Xóa tất cả thành công!!!')</script>";
}
?>
</form>
</div>

</body>
</html>
