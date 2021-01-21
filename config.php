<?php
	$hostname = "localhost";
	$user = "root";
	$pass = "";
	$db = "qnbus";
	$conn = mysqli_connect($hostname, $user, $pass, $db);
	mysqli_query($conn, $db);
	mysqli_set_charset($conn, "utf8");
  ?>