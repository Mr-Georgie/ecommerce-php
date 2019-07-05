<?php

 session_start();
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

     <div class="container mt-3">
       <div class="row">
         <div class="col-12">
           <ul class="breadcrumb bg-white pl-5 pr-5" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .1); border-radius:0;">
             <li class="pr-3">
               <a href="index.php">Home</a>
             </li>
             <li class="pr-3">
               <a href="category.php"> <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> Categories</a>
             </li>
             <!--li class="pr-3">
               <a href="category.php?p_cat=<?php //echo $p_cat_id; ?>"> <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> <?php //echo $p_cat_title; ?></a>
             </li-->
             <!--li class="pr-3">
               <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> <?php //echo $pro_title; ?>
             </li-->
           </ul>
         </div>
         <div class="col-sm-12 col-md-3">
           <?php include('includes/sidebar.php'); ?>
         </div>
         <div class="col-md-9 mb-5">
           <div class="container pb-5 pt-4" style="border: solid 1px #e6e6e6;box-sizing: border-box;background:white; padding: 15px;">
             <div class="row">
               <div class="col-12 text-center">
                 <h6 class="text-danger">One product added to cart. View your shopping cart <a href="users/cart.php">here</a> or check out other products below.</h6>
               </div>
               <div class="col-12 mt-5">
                 <div class="container card mb-3" style="padding: 15px;">
                   <div class='row'>
                     <div class='col-12 text-center pr-4 pl-4 pt-4 pb-2'>
                         <h2>Other Products You May Want To Buy</h2>
                         <hr style='background:red; width: 100px; height: 2px;'>
                     </div>
                         <?php

                         $get_products = "SELECT * FROM products order by rand() LIMIT 0,4";
                         $run_products = mysqli_query($db,$get_products);

                         while ($row_products=mysqli_fetch_array($run_products)){

                           $pro_id = $row_products['product_id'];
                           $pro_title = $row_products['product_title'];
                           $pro_price = $row_products['product_price'];
                           $pro_img1 = $row_products['product_img1'];
                           $pro_desc = $row_products['product_desc'];

                           echo "

                           <div class='col-sm-6 col-md-3 pb-5'>
                             <div class='card h-100'>
                               <div class='header'>
                                 <a href='product.php?pro_id=$pro_id'>
                                   <img src='admin/img/products/$pro_img1' alt='products' class='img-fluid card-img-top' style='height:250px; width:100%;'>
                                 </a>
                               </div>
                               <div class='body'>
                                 <h4 class='text-center' style='font-size:;font-weight:400;color:black;'><a href='product.php?pro_id=$pro_id' style='color:black;'> $pro_title </a></h4>
                                 <h4 class='text-center'>$$pro_price</h4>
                                 <p class='button text-center'>
                                   <a href='product.php?pro_id=$pro_id' class='btn btn-danger'><i class='fa fa-plus' aria-hidden='true'></i>Add to Cart</a>
                                 </p>
                                </div>
                               </div>
                             </div>

                           ";
                         }
                         ?>
                       </div>
                     </div>

                   </div>
                 </div>
               </div>
             </div>
           </div>

         </div>


       </div>
     </div>

     <?php include('includes/footer.php'); ?>

   </body>
 </html>
