<?php
include "config.php";
if(isset($_POST["submit"]))
	{
		$id = $_POST["id"];
		$routeid = $_POST["routeid"];
		$name =$_POST["name"];
		$lati = $_POST["latitudeCenter"];
		$longi =$_POST["longitudeCenter"];
		if ($routeid == "" || $name == "" || $lati == "" || $longi== "") {
			echo"<script>alert('Bạn vui lòng điền đầy đủ thông tin!')</script>";
		
		}else{	
			$sql = "UPDATE route_setting SET name='$name',latitudeCenter='$lati',longitudeCenter ='$longi' where id='$id'	";
		mysqli_query($conn,$sql);
			$id=GLOBALS['id'];
		 echo "<script>alert('Update thành công')</script>";
		 header('Location:listmarker.php?id=$id');
			}
	}
	
?>