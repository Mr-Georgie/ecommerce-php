<?php

session_start();
include("includes/db.php");
include("functions/functions.php");

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grace Stores</title>

     <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome-icons/node_modules/font-awesome/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">


  </head>
  <body>
    <!-- jQuery -->
    <script src="jquery/dist/jquery.slim.min.js"></script>

     <!-- Bootstrap Core JavaScript -->
     <script src="bootstrap/dist/js/bootstrap.bundle.js"></script>
     <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>

     <?php include('includes/header.php'); ?>

     <!-- Page content -->
     <div class="mb-5">
       <!-- carousel container -->
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         </ol>
         <div class="carousel-inner">
           <?php

           $get_slides = "select * from slider LIMIT 0,1";

           $run_slides = mysqli_query($con,$get_slides);

           while ($row_slides=mysqli_fetch_array($run_slides)) {

             $slide_name = $row_slides['slide_name'];
             $slide_image = $row_slides['slide_image'];

             echo "

             <div class='carousel-item active'>

             <img src='admin/img/slider/$slide_image' class='d-block w-100' alt='slider-image'>

             </div>

             ";
           }

           $get_slides = "select * from slider LIMIT 1,3";

           $run_slides = mysqli_query($con,$get_slides);

           while ($row_slides=mysqli_fetch_array($run_slides)) {

             $slide_name = $row_slides['slide_name'];
             $slide_image = $row_slides['slide_image'];

             echo "

             <div class='carousel-item'>

             <img src='admin/img/slider/$slide_image' class='d-block w-100' alt='slider-image'>

             </div>

             ";
           }

            ?>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
       </div>
       <!-- /carousel container -->
     </div>
     <div class="container pb-5">
       <!-- banner -->
         <div id="banner">
           <div class="row">
             <div class="col-md-4">
               <div class="card">
                 <div class="icon">
                   <i class="fa fa-heart"></i>
                 </div>
                 <h3><span>Best offer</span></h3>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
               </div>
             </div>
             <div class="col-md-4">
               <div class="card">
                 <div class="icon">
                   <i class="fa fa-tag"></i>
                 </div>
                 <h3><span>Best prices</span></h3>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>              </div>
             </div>
             <div class="col-md-4">
               <div class="card">
                 <div class="icon">
                   <i class="fa fa-thumbs-up"></i>
                 </div>
                 <h3><span>100% original</span></h3>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
               </div>
             </div>
           </div>
         </div>
       <!-- /banner -->
     </div>
     <!-- /.container class with content as the id-->

     <!-- card -->
     <div id="latest">


       <div class="container" style="">
        <div class="container mb-5 pt-5">
          <div class="row">
            <div class="col-md-4 text-uppercase">
              <div class="row">
                <h2 style="color: red;">Hot New Deals!</h2>
              </div>
              <div class="row">
                <div class="underline"></div>
              </div>
            </div>
          </div>
        </div>
       </div>
     <!-- /card -->

     <!-- Page Content -->
     <div class="container pb-5">
       <div id="store-front">
         <div class="row">
           <div class="col-sm-12">
             <div class="row">
               <?php getPro(); ?>
             </div>
           </div>
         </div>
         <div class="text-center mt-3">
           <div class="col-sm-12">
             <a href="category.php" class="btn btn-outline-info btn-lg">SHOP NOW!</a>
           </div>
         </div>
       </div>
     </div>

     </div>

     <!--?php include('includes/products-view.php'); ?-->
     <?php include('includes/footer.php'); ?>

  </body>
</html>
