<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Thêm tuyến xe</title>
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
    
</style>
<body>


  <form id="contact"  method="post" >
  <a href="admin?options=listcontact" style="margin-left:580px;">Danh sách tuyến xe</a>
  <h3>Thêm tuyến xe </h3>
    <fieldset>
      <input placeholder="Route ID" type="text"  name="routeid"  autofocus>

    </fieldset>
    <fieldset>
      <input placeholder="Name" type="text"  name="name" >

    </fieldset>
    <fieldset>
      <input placeholder="Start Time" type="text"  name="starttime"> 


    </fieldset>
	 <fieldset>
      <input placeholder="End Time" type="text"  name="endtime"  >

    </fieldset>
    <fieldset>
      <input placeholder="Fare" type="text"  name="fare" >

    </fieldset>
    <fieldset>
      <input placeholder="Route Lenght" type="text"  name="routelenght"> 
    </fieldset>
	  <fieldset>
      <input placeholder="Number Of Lenght" type="text"  name="numberoflenght"> 
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Thêm</button>
    </fieldset>
 
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
		$numberoflenght = $_POST["numberoflenght"];
		$sql="select routeId from route_description";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result))
		{
			if($row['routeId']==$routeid)
			{
				echo "<script>alert('Mã tuyến xe đã trùng lặp!!!')</script>";
				break;
			}
			if ($routeid == "" || $name == "" || $starttime == "" || $endtime== ""||$fare == "" || $routelenght == "" || $numberoflenght == "") 
			{
				echo"<script>alert('Bạn vui lòng điền đầy đủ thông tin!')</script>";
				break;
			}
			else
			{	
				$sql = "INSERT INTO route_description VALUES ('$routeid', '$name', '$starttime', '$endtime','$fare','$routelenght', '$numberoflenght')";
				mysqli_query($conn,$sql);
				echo "<script>alert('Thêm tuyến xe thành công')</script>";
				unset($_POST['submit']);
				break;
			}
		}
		
	}
?>
  

</body>
</html>