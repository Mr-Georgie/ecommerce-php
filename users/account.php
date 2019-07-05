<?php session_start();

    if (!isset($_SESSION['customer_email'])) {
      // code...
      echo "<script>window.open('checkout.php?','_self')</script>";
    } else {
      // code...

?>
<?php
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

     <?php include('includes/user-header.php'); ?>

    <!-- Page Content -->
    <div class="container pb-5 mt-3">
      <div class="row">
        <div class="col-12">
          <ul class="breadcrumb bg-white pl-5 pr-5" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .1); border-radius: 0;">
            <li class="pr-3">
              <a href="../index.php">Home</a>
            </li>
            <li class="pr-3">
              <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> My Account
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <?php include('includes/user-sidebar.php'); ?>
        </div>
        <div class="col-md-9">
          <div class="card">
            <?php

            if (isset($_GET['my_orders'])) {
              include ("my_orders.php");
            }

             ?>
             <?php

             if (isset($_GET['pay_offline'])) {
               include ("pay_offline.php");
             }

              ?>
              <?php

              if (isset($_GET['edit_account'])) {
                include ("edit_account.php");
              }

               ?>
               <?php

               if (isset($_GET['change_pass'])) {
                 include ("change_pass.php");
               }

                ?>
                <?php

                if (isset($_GET['delete_account'])) {
                  include ("delete_account.php");
                }

                 ?>
          </div>
        </div>
      </div>
    </div>
    <!-- div element with the content as id and a .container class -->

    <?php include('includes/user-footer.php'); ?>

  </body>
</html>
<?php   } ?>
