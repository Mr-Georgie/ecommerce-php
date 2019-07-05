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

    <?php
    $active='Shop';
    include('includes/header.php');
    ?>

    <!-- Page Content -->
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <ul class="breadcrumb bg-white pl-5 pr-5" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .1); border-radius: 0;">
            <li class="pr-3">
              <a href="index.php">Home</a>
            </li>
            <li class="pr-3">
              <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> Categories
            </li>
          </ul>
        </div>
        <div class="col-sm-4 col-md-3">
         <?php include('includes/sidebar.php'); ?>
        </div>
        <div class="col-sm-8 col-md-9" id="store-front">
          <div class="container card mb-3">
            <div class='row'>

              <?php

                  if (!isset($_GET['p_cat'])) {

                    if (!isset($_GET['cat'])) {

                        echo "
                        <div class=''>
                          <div class='text-center mb-4 pr-4 pl-4 pt-4 pb-2'>
                            <h2>All Products</h2>
                            <hr style='background:red; width: 100px; height: 2px;'>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                               Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>

                          </div>
                        </div>
                        ";

                        echo " <div class='row'>" . getAllPro() . "</div>";
                    }
                  }
              ?>
              <?php getEachPCat() ?>
              <?php getEachCat() ?>
            </div>
          </div>
          <div class="col-12 center">
              <nav aria-label="Page navigation example">
               <ul class="pagination justify-content-center">
                 <?php

                 $no_of_products_per_page = 6;
                 $query = "SELECT * FROM products";
                 $result = @mysqli_query($db,$query);
                 $total_records = @mysqli_num_rows($result);
                 $total_pages = ceil($total_records / $no_of_products_per_page);

                 echo "
                       <li class='page-item'>
                         <a class='page-link' href='category.php?pageno=1'>First Page</a>
                       </li>
                       ";

                       for ($i=1; $i < $total_pages; $i++) {
                         // code...
                         echo "
                              <li class='page-item'>
                               <a class='page-link' href='category.php?pageno=$i'>$i</a>
                              </li>
                              ";
                       };

                  echo "
                       <li class='page-item'>
                        <a class='page-link' href='category.php?pageno=$total_pages''>Last Page</a>
                       </li>
                       ";

                 ?>
               </ul>
              </nav>
            </div>
        </div>
      </div>
    </div>

    <?php include('includes/footer.php'); ?>

  </body>
</html>
