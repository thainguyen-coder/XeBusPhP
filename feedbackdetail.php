<?php

$name_error = $email_error=$phone_error=$url_error="";
$name= $email = $phone = $message= $url= $success="";

if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(empty($_POST["name"]))
	{
		$name_error ="Tên là bắt buộc";
	}
	else{
		$name = test_input($_POST["name"]);
			//check if name only contains letters anh whitespace
		if(!preg_match("/^[a-zA-Z ]*$/", $name)){
			$name_error = "";
		}
	}

	if(empty($_POST["email"]))
	{
		$email_error = "Email là bắt buộc.";
	}else{
		$email = test_input($_POST["email"]);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$email_error ="Định dạng email không hợp lệ";
		}
	}

	if(empty($_POST["phone"])){
		$phone_error = "Số điện thoại là bắt buộc.";
	}else{
		$phone = test_input($_POST["phone"]);
		//check if e-mail address is well-formed
		if(!preg_match("/^(d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)){
			$phone_error ="Số điện thoại không lệ.";
		}
	}


	if(empty($_POST["message"])){
		$message = "";
	}else{
		$message =test_input($_POST["message"]);
	}

	include "config.php";
	if(isset($_POST["submit"]))
	{
			//lay thong tin tu form
		$email = $_POST["email"];
		$name =$_POST["name"];
		$phone = $_POST["phone"];
		$message =$_POST["massage"];
		
		if ($email == "" || $name == "" || $phone == "" || $message== "") {
			echo"<script>alert('Bạn vui lòng điền đầy đủ thông tin!')</script>";
		
		}else{
			$time=date("Y/m/d");
			
			$sql = "INSERT INTO feedback(Email, Name, Phone, Message, Time) VALUES ('$email', '$name', '$phone', '$message','$time')";
				// thực thi câu $sql với biến conn lấy từ file connection.php
		mysqli_query($conn,$sql);
		
		 echo "<script>alert('Cảm ơn phản hồi của bạn.Chúng tôi sẽ nhanh chóng khắc phục để đem đến sự hài lòng cho hành khách')</script>";
		 	//unset($_POST['submit']);
		 
		
	}
}

		
	}


function test_input($data){
	$data = trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
?>