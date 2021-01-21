<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update Trạm</title>
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
  <h2>Update Trạm</h2>
    
	<?php 
				
				include 'config.php';
				$GLOBALS['id']=$id = isset($_GET['id']) ? $_GET['id'] : '';
				$query = "select * from route_setting where routeId = '$id' ";
				$result = mysqli_query($conn, $query);
				if($row = mysqli_fetch_array($result))
				{
					$GLOBALS['idtram']=$row['id'];
					for($i=1;$i<2;$i++){
					echo "<input placeholder='ID' type='text'  name='id' value='$row[id]' disabled>";
					echo "<input placeholder='Route ID' type='text'  name='routeid' value='$row[routeId]' disabled >";
					echo "<input placeholder='Name' type='text'  name='name' value='$row[name]' autofocus>";
					echo "<input placeholder='Latitude Center' type='text'  name='latitudeCenter' value='$row[latitudeCenter]'>";
					echo "<input placeholder='Longitude Center' type='text'  name='longitudeCenter' value='$row[longitudeCenter]'>";
					}
				}
				
				?>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Sửa</button>
    </fieldset>
	<?php 
	$url="listmarker.php?id=".$GLOBALS['id'];
	echo "<a href='$url'>Quay lại</a>"
	?>
  </form>
  <script type="text/javascript">
			function redirect($a)
			{
				header("Location: {$a}");
			}
			</script>
  <?php
include "config.php";
if(isset($_POST["submit"]))
	{
		$GLOBALS['idtuyen']=$id = isset($_GET['id']) ? $_GET['id'] : '';
		$name =$_POST["name"];
		$lati = $_POST["latitudeCenter"];
		$longi =$_POST["longitudeCenter"];
		if ($id == "" || $name == "" || $lati == "" || $longi== "") {
			echo"<script>alert('Bạn vui lòng điền đầy đủ thông tin!')</script>";
		}
		else{	
			$sql = "UPDATE route_setting SET  routeId='$GLOBALS[idtuyen]',name='$name',latitudeCenter='$lati',longitudeCenter ='$longi' where id='$GLOBALS[idtram]'	";
			mysqli_query($conn,$sql);
			function redirect($a)
			{
				header("Location: {$a}");
			}
			$url="listmarker.php?id=".$GLOBALS['id'];
			redirect($url);
			}
	}
?>
</div>
</body>
</html>