<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

session_start();
include('includes/db.php');

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Grace Stores Administrator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="js/jquery-2.1.1.min.js"></script>
<!--icons-css-->
<link href="css/font-awesome.css" rel="stylesheet">
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--static chart-->
</head>
<body>
<div class="login-page">
    <div class="login-main">
    	 <div class="login-head">
				<h1>Admin Login</h1>
			</div>
			<div class="login-block">
				<form action="" method="post">
					<input type="text" name="email" placeholder="Email" required="">
					<input type="password" name="password" class="lock" placeholder="Password">
					<div class="forgot-top-grids">
						<div class="forgot-grid">
							<!--ul>
								<li>
									<input type="checkbox" id="brand1" value="">
									<label for="brand1"><span></span>Remember me</label>
								</li>
							</ul-->
						</div>
						<div class="forgot">
							<!--a href="#">Forgot password?</a-->
						</div>
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="Sign_in" value="Login">
					<!--div class="login-icons">
						<ul>
							<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div-->
				</form>
				<!--h5><a href="index.html">Go Back to Home</a></h5-->
			</div>
      </div>
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>
<!--COPY rights end here-->

<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>
<?php

    if (isset($_POST['Sign_in'])) {
      // code...
      $admin_email = mysqli_real_escape_string($con, $_POST['email']);
      $admin_password = mysqli_real_escape_string($con, $_POST['password']);
      $get_admin = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_pass='$admin_password'";
      $run_admin = @mysqli_query($con,$get_admin);
      $count = mysqli_num_rows($run_admin);
      if ($count==1) {
        // code...
        $_SESSION['admin_email'] = $admin_email;
        echo "<script> alert('Logged In. Welcome Back') </script>";
        echo "<script> window.open('index.php?dashboard', '_self') </script>";
      }
      else {
        // code...
        echo "<script> alert('Email or Password is wrong!') </script>";
      }
    }

 ?>
