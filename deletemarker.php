<?php
include "config.php";
$idtram = isset($_GET['id']) ? $_GET['id'] : '';
$sql="select routeId from route_setting where id ='$idtram'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result))
{
	$GLOBALS['id']=$routeid=$row['routeId'];
	
}
if($id=="")
{
			 echo "<script>alert('Đã có lỗi xảy ra vui lòng thử lại sau')</script>";
			 $url="listmarker.php?id=".$GLOBALS['id'];
			function redirect($a)
			{
				header("Location: {$a}");
			}
			redirect($url);
			}

else
{
		$sql = "DELETE from route_setting where id='$idtram'";
		mysqli_query($conn,$sql);
		 echo "<script>alert('Xóa thành công')</script>";
			$url="listmarker.php?id=".$GLOBALS['id'];
			function redirect($a)
			{
				header("Location: {$a}");
			}
			redirect($url);
			}
			
?>