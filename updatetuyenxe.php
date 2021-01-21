<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Phản hồi</title>
  <link rel="stylesheet" href="">
</head>
<style>
  

* {
  margin:0;
  padding:0;
  box-sizing:border-box;
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  -webkit-font-smoothing:antialiased;
  -moz-font-smoothing:antialiased;
  -o-font-smoothing:antialiased;
  font-smoothing:antialiased;
  text-rendering:optimizeLegibility;
}

body {
  <!--font-family:"Open Sans", Helvetica, Arial, sans-serif;-->
  font-weight:300;
  font-size: 12px;
  line-height:30px;
  color:#777;
  background:#0CF;
}

.container {
  max-width:400px;
  width:100%;
  margin:0 auto;
  position:relative;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] { font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif; }

#contact {
  background:#F9F9F9;
  padding:25px;
  margin:50px 0;
  width: 900px;
  padding-left: 50px;

   position: absolute;

}

#contact h3 {
  color: #F96;
  display: block;
  font-size: 30px;
  font-weight: 400;
}

#contact h4 {
  margin:5px 0 15px;
  display:block;
  font-size:13px;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
  width:100%;
  border:1px solid #CCC;
  background:#FFF;
  margin:0 0 5px;
  padding:10px;
}

#contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {
  -webkit-transition:border-color 0.3s ease-in-out;
  -moz-transition:border-color 0.3s ease-in-out;
  transition:border-color 0.3s ease-in-out;
  border:1px solid #AAA;
}

#contact textarea {
  height:100px;
  max-width:100%;
  resize:none;
}

#contact button[type="submit"] {
  cursor:pointer;
  width:100%;
  border:none;
  background:#0CF;
  color:#FFF;
  margin:0 0 5px;
  padding:10px;
  font-size:15px;
}

#contact button[type="submit"]:hover {
  background:#09C;
  -webkit-transition:background 0.3s ease-in-out;
  -moz-transition:background 0.3s ease-in-out;
  transition:background-color 0.3s ease-in-out;
}
.error{
  color: red;
}
.success{
  color: #ff9966;
  text-align: center;
  font-size: 14px;

}
#contact button[type="submit"]:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }

#contact input:focus, #contact textarea:focus {
  outline:0;
  border:1px solid #999;
}
::-webkit-input-placeholder {
 color:#888;
}
:-moz-placeholder {
 color:#888;
}
::-moz-placeholder {
 color:#888;
}
:-ms-input-placeholder {
 color:#888;
}
a:link{
	margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}
    
</style>
<body>

  <div class="container">  
  <form id="contact"  method="post"  >
  <h2>Thêm tuyến xe </h2>
    
	<?php 
				
				include 'config.php';
				$id = isset($_GET['id']) ? $_GET['id'] : '';
				$query = "select * from route_description where routeId = '$id' ";
				$result = mysqli_query($conn, $query);
				if($row = mysqli_fetch_array($result))
				{
					for($i=1;$i<2;$i++){
					echo "<input placeholder='Route ID' type='text'  name='routeid' value='$row[routeId]' autofocus readonly>";
					echo "<input placeholder='Name' type='text'  name='name' value='$row[name]'>";
					echo "<input placeholder='Start Time' type='text'  name='starttime' value='$row[startTime]'>";
					echo "<input placeholder='End Time' type='text'  name='endtime' value='$row[endTime]'>";
					echo "<input placeholder='Fare' type='text'  name='fare' value='$row[fare]'>";
					echo "<input placeholder='Route Lenght' type='text'  name='routelenght' value='$row[routeLenght]'>";
					echo "<input placeholder='Number Of Route' type='text'  name='numberofroute' value='$row[numberOfRoute]'>";
					}
				}
				?>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Sửa</button>
    </fieldset>
	<a href="admin?options=listcontact">Quay lại</a>
  </form>
  <?php
include "config.php";
if(isset($_POST["submit"]))
	{
		$routeid = $_POST["routeid"];
		$name =$_POST["name"];
		$starttime = $_POST["starttime"];
		$endtime =$_POST["endtime"];
		$fare = $_POST["fare"];
		$routelenght =$_POST["routelenght"];
		$numberoflenght = $_POST["numberofroute"];
		if ($routeid == "" || $name == "" || $starttime == "" || $endtime== ""||$fare == "" || $routelenght == "" || $numberoflenght == "") {
			echo"<script>alert('Bạn vui lòng điền đầy đủ thông tin!')</script>";
		
		}else{	
			$sql = "UPDATE route_description SET name='$name',startTime='$starttime',endTime ='$endtime',fare=$fare,routeLenght=$routelenght,
				numberOfRoute=$numberoflenght where routeId='$routeid'	";
		mysqli_query($conn,$sql);
			
		 echo "<script>alert('Update thành công')</script>";
		 
		 header('Location:admin?options=listcontact');
			}
	}
	
?>
</div>
</body>
</html>