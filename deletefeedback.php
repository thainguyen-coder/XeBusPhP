<?php

		include 'config.php'; 
		$query = "Delete from feedback";
		mysqli_query($conn,$query);
		echo "<script>alert('Xóa tất cả thành công!!!')</script>";
		header('Location:admin?options=viewphananh');

?>