<?php

include "config.php";
$id = isset($_GET['id']) ? $_GET['id'] : '';
if($id=="")
{
			 echo "<script>alert('Đã có lỗi xảy ra vui lòng thử lại sau')</script>";
			 header('Location:admin?options=listcontact');
}
else
{
		$sql = "DELETE from route_description where routeId='$id'	";
		mysqli_query($conn,$sql);
		 echo "<script>alert('Xóa thành công')</script>";
		 header('Location:admin?options=listcontact');
}			
	
	
?>