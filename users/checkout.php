<?php
session_start();
include("../functions/functions.php");
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
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../font-awesome-icons/node_modules/font-awesome/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="../style.css" rel="stylesheet">


  </head>
  <body>
    <!-- jQuery -->
    <script src="../jquery/dist/jquery.slim.min.js"></script>

     <!-- Bootstrap Core JavaScript -->
     <script src="../bootstrap/dist/js/bootstrap.bundle.js"></script>
     <script src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>

     <?php
     $active = 'Account';
     include('includes/user-header.php');
     ?>

    <!-- Page Content -->
    <div class="container pb-5 mt-3">
      <div class="row">
        <div class="col-12">
          <ul class="breadcrumb bg-white pl-5 pr-5" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .1); border-radius: 0;">
            <li class="pr-3">
              <a href="../index.php">Home</a>
            </li>
            <li class="pr-3">
              <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> Checkout
            </li>
          </ul>
        </div>
        <div class="d-none d-sm-none d-md-none d-lg-block col-lg-4">
          <div class="container card" style="position: relative; width:100%;">
            <img src="../img/banner15.jpg" alt="products" class="" style="width:100%; height:auto;">
            <div class="text" style="position: absolute; top: 50%; left: 50%; bottom: 220px; transform: translate(-50%,-50%);">
              <h1 style="background: ; color: white;">NEW COLLECTIONS</h1>
              <h4 style="background: ; color: white;">Available</h4>
              <a href="../category.php" class="btn btn-warning"> SHOP NOW </a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8">
          <div class="card">
            <?php
            if (!isset($_SESSION['customer_email'])) {

              include("login.php");

            } else {

              include("payment_option.php");
            }

            ?>
          </div>
        </div>
      </div>
    </div>
    <?php include('includes/user-footer.php'); ?>

  </body>
</html>
