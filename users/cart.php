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

     <?php include('includes/user-header.php'); ?>

     <!-- Page Content -->
     <div class="container mt-3">
       <div class="row">
         <div class="col-12">
           <ul class="breadcrumb bg-white pl-5 pr-5" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .1); border-radius: 0;">
             <li class="pr-3">
               <a href="../index.php">Home</a>
             </li>
             <li class="pr-3">
               <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> Cart
             </li>
           </ul>
         </div>
         <div class="col-md-9 mb-5">
           <div class="card col-12" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .1); border-radius: 0;">
             <div class="container-fluid pt-3 pb-3">
               <div class="col-12">
                 <h1 class="">Shopping Cart</h1>

                 <?php

                 $ip_add = getRealIpUser();
                 $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
                 $run_cart = @mysqli_query($db,$select_cart);
                 $count = @mysqli_num_rows($run_cart);

                 ?>

                 <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
               </div>
               <form action="cart.php" method="post" enctype="multipart/form-data">
                 <div class="form-group col-12">
                   <table class="table table-responsive">
                     <thead>
                       <tr>
                         <th colspan="2">Product</th>
                         <th>Quantity</th>
                         <th>Unit Price</th>
                         <th>Size</th>
                         <th colspan="1">Delete</th>
                         <th colspan="2">Sub-total</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php

                        $total = 0;

                        while ($row_cart = mysqli_fetch_array($run_cart)) {
                          // code...
                          $pro_id = $row_cart['p_id'];
                          $pro_size = $row_cart['size'];
                          $pro_qty = $row_cart['qty'];

                          $get_products = "SELECT * FROM products WHERE product_id='$pro_id'";
                          $run_products = @mysqli_query($db,$get_products);

                          while ($row_products = mysqli_fetch_array($run_products)) {
                            // code...
                            $product_title = $row_products['product_title'];
                            $product_price = $row_products['product_price'];
                            $product_img1 = $row_products['product_img1'];
                            $sub_total = $product_price * $pro_qty;
                            $total += $sub_total;

                       ?>
                       <tr>
                         <td>
                           <img class="img-thumbnail img-fluid w-50" src="../admin/img/products/<?php echo $product_img1; ?>" alt="">
                         </td>
                         <td>
                           <a href="../product.php?pro_id=<?php echo $pro_id; ?>"><?php echo $product_title; ?></a>
                         </td>
                         <td class="text-center">
                           <?php echo $pro_qty; ?>
                         </td>
                         <td>
                           $<?php echo $product_price; ?>
                         </td>
                         <td>
                           <?php echo $pro_size; ?>
                         </td>
                         <td class="text-center">
                           <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                         </td>
                         <td>
                           $<?php echo $sub_total; ?>
                         </td>
                       </tr>
                       <?php } }?>
                     </tbody>
                     <tfoot>
                       <tr style="font-size:22px;">
                         <th colspan="5">Total</th>
                         <th colspan="2">$<?php echo $total; ?></th>
                       </tr>
                     </tfoot>
                   </table>
                 </div>
                 <div class="row mb-2">
                   <div class="col-12 col-sm-6">
                     <a href="index.php" class="btn btn-outline-primary mb-2">
                       <i class="fa fa-chevron-left"></i>Continue Shopping
                     </a>
                   </div>
                   <div class="col-12 col-sm-6">
                     <button type="submit" name="update" value="Update" class="btn btn-danger mb-2">
                       <i class="fa fa-refresh"></i>Update Cart
                     </button>
                     <a href="checkout.php" class="btn btn-outline-success mb-2">
                       Proceed to Checkout<i class="fa fa-chevron-right"></i>
                     </a>
                   </div>
                 </div>
               </form>
             </div>
           </div>
         </div>
         <?php

         function update_cart(){

           global $db;

           if (isset($_POST['update'])) {
             // code...
             foreach ($_POST['remove'] as $remove_id) {
               // code...
               $delete_product = "DELETE FROM cart WHERE p_id='$remove_id'";
               $run_delete = @mysqli_query($db,$delete_product);

               if ($run_delete) {
                 // code...
                 echo "<script>window.open('cart.php','_self')</script>";
               }
             }
           }
         }
         echo $up_cart = update_cart();

         ?>
         <div class="col-md-3 sidebar-menu">
           <div class="card">
             <div class="card-header">
               <h3 class="">Order Summary</h3>
             </div>
             <div class="card-body">
               <p class="text-muted">
                 Shipping and additional costs are calculated based on value you entered
               </p>
               <table class="table table-responsive">
                 <tbody>
                   <tr>
                     <td> All Order Sub-total </td>
                     <th> $<?php echo $total; ?></th>
                   </tr>
                   <tr>
                     <td> Shipping and Handling </td>
                     <th> $0</th>
                   </tr>
                   <tr>
                     <td> Tax </td>
                     <th> $0</th>
                   </tr>
                   <tr style="font-size:22px;">
                     <td> Total </td>
                     <th> $<?php echo $total; ?></th>
                   </tr>
                 </tbody>
               </table>
             </div>
           </div>
         </div>
         <div class="col-md-12 mt-1 mb-4">
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
                             <img src='../admin/img/products/$pro_img1' alt='products' class='img-fluid card-img-top' style='height:250px; width:100%;'>
                           </a>
                         </div>
                         <div class='body'>
                           <h4 class='text-center' style='font-size:;font-weight:400;color:black;'><a href='../product.php?pro_id=$pro_id' style='color:black;'> $pro_title </a></h4>
                           <h4 class='text-center'>$$pro_price</h4>
                           <p class='button text-center'>
                             <a href='../product.php?pro_id=$pro_id' class='btn btn-danger'><i class='fa fa-plus' aria-hidden='true'></i>Add to Cart</a>
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

     <?php include('includes/user-footer.php'); ?>

   </body>
   </html>
