<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Phản hồi</title>
  <link rel="stylesheet" href="">
</head>
<style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

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
    
</style>
<body>
  <?php include('feedbackdetail.php'); ?>
  <div class="container">  
  <form id="contact" action="#" method="post" >
    <h3>LIÊN HỆ NHANH</h3>
    <h4>LIÊN HỆ VỚI CHÚNG TÔI NGAY HÔM NAY, VÀ NHẬN TRẢ LỜI TRONG 24 GIỜ!</h4>
    <fieldset>
      <input placeholder="Họ tên hành khách" type="text" tabindex="1" name="name" value="<?= $name ?>" autofocus>
      <span class="error"><h6><?= $name_error ?></h6></span>
    </fieldset>
    <fieldset>
      <input placeholder="Địa chỉ Email" type="text" tabindex="2" name="email" value="<?= $email ?>">
      <span class="error"><h6><?= $email_error ?></h6></span>
    </fieldset>
    <fieldset>
      <input placeholder="Số điện thoại" type="text" tabindex="3" name="phone" value="<?= $phone ?>"> 
      <span class="error"><h6><?= $phone_error ?></h6></span>
    </fieldset>
    <fieldset>
      <textarea placeholder="Gõ tin nhắn của bạn ở đây...." tabindex="5" name="massage" value="<?= $message ?>"></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Gửi</button>
    </fieldset>
 
  </form>
 
  
</div>
</body>
</html>