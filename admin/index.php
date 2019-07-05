<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

session_start();
include('includes/db.php');

  if (!isset($_SESSION['admin_email'])) {
    echo "<script> window.open('login.php', '_self') </script>";
  } else {
    // code...
    $admin_email = $_SESSION['admin_email'];
    $get_admin = "SELECT * FROM admins WHERE admin_email='$admin_email'";
    $run_admin = @mysqli_query($con,$get_admin);
    $row_admin = mysqli_fetch_array($run_admin);
    $admin_id = $row_admin['admin_id'];
    $admin_name = $row_admin['admin_name'];
    $admin_job = $row_admin['admin_job'];
    $admin_about = $row_admin['admin_about'];
    $admin_image_1 = $row_admin['admin_image_1'];
    $admin_image_2 = $row_admin['admin_image_2'];
    $admin_contact = $row_admin['admin_contact'];

    $get_product = "SELECT * FROM products";
    $run_product = @mysqli_query($con,$get_product);
    $count_product = mysqli_num_rows($run_product);

    $get_customer = "SELECT * FROM customers";
    $run_customer = @mysqli_query($con,$get_customer);
    $count_customer = mysqli_num_rows($run_customer);

    $get_p_cats = "SELECT * FROM product_categories";
    $run_p_cats = @mysqli_query($con,$get_p_cats);
    $count_p_cats = mysqli_num_rows($run_p_cats);

    $get_orders = "SELECT * FROM pending_orders";
    $run_orders = @mysqli_query($con,$get_orders);
    $count_orders = mysqli_num_rows($run_orders);

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
<script src="js/Chart.min.js"></script>
<!--//charts-->
<!-- geo chart -->
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--<script src="lib/html5shiv/html5shiv.js"></script>-->
     <!-- Chartinator  -->
    <script src="js/chartinator.js" ></script>
    <script type="text/javascript">
        jQuery(function ($) {

            var chart3 = $('#geoChart').chartinator({
                tableSel: '.geoChart',

                columns: [{role: 'tooltip', type: 'string'}],

                colIndexes: [2],

                rows: [
                    ['China - 2015'],
                    ['Colombia - 2015'],
                    ['France - 2015'],
                    ['Italy - 2015'],
                    ['Japan - 2015'],
                    ['Kazakhstan - 2015'],
                    ['Mexico - 2015'],
                    ['Poland - 2015'],
                    ['Russia - 2015'],
                    ['Spain - 2015'],
                    ['Tanzania - 2015'],
                    ['Turkey - 2015']],

                ignoreCol: [2],

                chartType: 'GeoChart',

                chartAspectRatio: 1.5,

                chartZoom: 1.75,

                chartOffset: [-12,0],

                chartOptions: {

                    width: null,

                    backgroundColor: '#fff',

                    datalessRegionColor: '#F5F5F5',

                    region: 'world',

                    resolution: 'countries',

                    legend: 'none',

                    colorAxis: {

                        colors: ['#679CCA', '#337AB7']
                    },
                    tooltip: {

                        trigger: 'focus',

                        isHtml: true
                    }
                }


            });
        });
    </script>
<!--geo chart-->

<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>

<body>
<div class="page-container">
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.php?dashboard"> <h1>Admin</h1>
									<!--<img id="logo" src="" alt="Logo"/>-->
								  </a>
							</div>
							<!--search-box-->
								<div class="search-box">
									<form>
										<input type="text" placeholder="Search..." required="">
										<input type="submit" value="">
									</form>
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 3 new messages</h3>
												</div>
											</li>
											<li><a href="#">
											   <div class="user_img"><img src="img/p4.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>
											</a></li>
											<li class="odd"><a href="#">
												<div class="user_img"><img src="img/p2.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor </p>
												<p><span>1 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>
											</a></li>
											<li>
												<div class="notification_bottom">
													<a href="#">See all messages</a>
												</div>
											</li>
										</ul>
									</li>
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have 3 new notification</h3>
												</div>
											</li>
											<li><a href="#">
												<div class="user_img"><img src="img/p5.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>
											 </a></li>
											 <li class="odd"><a href="#">
												<div class="user_img"><img src="img/p6.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>
											 </a></li>
											 <li><a href="#">
												<div class="user_img"><img src="img/p7.png" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>
											 </a></li>
											 <li>
												<div class="notification_bottom">
													<a href="#">See all notifications</a>
												</div>
											</li>
										</ul>
									</li>
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
							<div class="profile_details">
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">
												<span class="prfil-img"><img src="img/<?php echo $admin_image_2; ?>" alt="" class="img-responsive"> </span>
												<div class="user-name">
													<p><?php echo $admin_name; ?></p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>
											</div>
										</a>
										<ul class="dropdown-menu drp-mnu">
                      <li><a href="index.php?user_profile=<?php echo $admin_id; ?>"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Profile</a> </li>
                      <li><a href="index.php?view_products"><i class="fa fa-fw fa-envelope" aria-hidden="true"></i> Products <span class="label label-danger"><?php echo $count_product; ?></span></a></li>
                      <li><a href="index.php?view_customers"><i class="fa fa-fw fa-user" aria-hidden="true"></i> Customers <span class="label label-danger"><?php echo $count_customer; ?></span></a></li>
                      <li><a href="index.php?view_cats"><i class="fa fa-fw fa-cog" aria-hidden="true"></i> Settings </a> </li>
                      <li><a href="logout.php"><i class="fa fa-fw fa-power-off" aria-hidden="true"></i> Log Out</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>
				     <div class="clearfix"> </div>
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

<?php

  if (isset($_GET['dashboard'])) {
    // code...
    include("dashboard.php");
  }
  if (isset($_GET['insert_products'])) {
    // code...
    include("insert_product.php");
  }
  if (isset($_GET['view_products'])) {
    // code...
    include("view_product.php");
  }
  if (isset($_GET['delete_product'])) {
    // code...
    include("delete_product.php");
  }
  if (isset($_GET['edit_product'])) {
    // code...
    include("edit_product.php");
  }
  if (isset($_GET['insert_p_cats'])) {
    // code...
    include("insert_p_cats.php");
  }
  if (isset($_GET['view_p_cats'])) {
    // code...
    include("view_p_cats.php");
  }
  if (isset($_GET['delete_p_cat'])) {
    // code...
    include("delete_p_cat.php");
  }
  if (isset($_GET['edit_p_cat'])) {
    // code...
    include("edit_p_cat.php");
  }
  if (isset($_GET['insert_cats'])) {
    // code...
    include("insert_cats.php");
  }
  if (isset($_GET['view_cats'])) {
    // code...
    include("view_cats.php");
  }
  if (isset($_GET['delete_cat'])) {
    // code...
    include("delete_cat.php");
  }
  if (isset($_GET['edit_cat'])) {
    // code...
    include("edit_cat.php");
  }

 ?>

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2019 Admin Dashboard. All Rights Reserved | Template by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <?php include("includes/sidebar.php") ?>
	<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;

$(".sidebar-icon").click(function() {
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
<script src="js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>
<?php } ?>
