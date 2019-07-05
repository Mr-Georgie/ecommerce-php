
<?php

if (isset($_GET['pro_id'])) {

    $product_id = $_GET['pro_id'];

    $get_products = "SELECT * FROM products WHERE product_id='$product_id'";

    $run_products = mysqli_query($db,$get_products);

    $row_products = mysqli_fetch_array($run_products);

    $p_cat_id = $row_products['p_cat_id'];
    $pro_title = $row_products['product_title'];
    $pro_price = $row_products['product_price'];
    $pro_img1 = $row_products['product_img1'];
    $pro_img2 = $row_products['product_img2'];
    $pro_img3 = $row_products['product_img3'];
    $pro_desc = $row_products['product_desc'];

    $get_p_cats = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";

    $run_p_cats = mysqli_query($db,$get_p_cats);

    $row_p_cats = mysqli_fetch_array($run_p_cats);

    $p_cat_title = $row_p_cats['p_cat_title'];

  } 

?>

<!-- Header -->
<div class="navbar-header sticky-top">
  <div class="container-fluid header-top bg-dark">
    <div class="container navbar navbar-dark bg-dark" id="top-bar">
      <div class="col-md-8">
        <?php

        $ip_add = getRealIpUser();
        $select_cart = "SELECT * FROM cart WHERE ip_add='$ip_add'";
        $run_cart = @mysqli_query($db,$select_cart);
        $count = @mysqli_num_rows($run_cart);

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
          }
        }
        ?>

        <a class="btn btn-success" a href="users/cart.php">
          <?php
          if (!isset($_SESSION['customer_email'])) {

             echo " Welcome";

          } else {

             echo "Welcome - " . $_SESSION['customer_email'];
          }
          ?>
        </a>
        <a class="text-light" a href="users/cart.php"><?php echo $count; ?> Items In Your Cart | Total Price: $<?php echo $total; ?></a>
      </div>
      <div class="col-md-4">
        <form class="navbar-form" action="results.php" method="get">
          <div class="input-group">
            <input type="text" name="user_query" placeholder="Search" class="form-control" style="border:0; border-radius:0;">
            <span class="input-group-btn">
              <button type="submit" name="search" value="search" class="btn btn-success">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-info">
    <nav class="container navbar navbar-expand-lg navbar-dark bg-info">
      <a class="navbar-brand" href="index.php">Grace <span style="color:orange;">Stores<i class="fa fa-cart-plus"></i></a></span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="category.php">Categories</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="users/cart.php">Shopping Cart<span class="badge pull-right"><?php echo $count; ?></span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
         <li class="pr-4 active">
           <?php
           if (!isset($_SESSION['customer_email'])) {

              echo "<a href='users/checkout.php' class='nav-link'>My Account </a>";

           } else {

              echo "<a href='users/account.php?my_orders' class='nav-link'></i> My Account </a>";;
           }
           ?>
         </li>
         <li class="pr-1 active">
             <?php
             if (!isset($_SESSION['customer_email'])) {

                echo "<a href='users/checkout.php' class='nav-link'> Login </a>";

             } else {

                echo "<a href='users/logout.php' class='nav-link'> Log Out </a>";;
             }
             ?>

         </li>
         <li class="pr-1 active"><a href="users/register-page.php" class="nav-link">Register</a></li>
        </ul>
      </div>
    </nav>
  </div>
</div>
<!-- /Header -->


<!-- Modal1
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h2 class="modal-title" id="myModalLabel">Sign in</h2>
       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
         <span class="sr-only">Close</span>
       </button>
     </div>
     <div class="modal-body">
       <form class="form-signin" role="form" action="checkout.php">
         <h3 class="form-signin-heading"></h3>
         <div class="form-group">
           <input type="email" class="form-control" placeholder="Email address" required autofocus>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
       </form>
     </div>
     <div class="row container">
       <div class="col-12 ml-2">
         <p>Don't have an account? <a href="users/register-page.php">Register Now!</a></p>
       </div>
     </div>
     <div class="modal-footer">
       <div class="col-4">
         <a href="#" class="btn btn-facebook btn-large btn-caps btn-block">Facebook <span class="fa fa-facebook"></span></a>
       </div>
       <div class="col-4">
         <a href="" class="btn btn-twitter btn-large btn-caps btn-block">Twitter
           <span class="fa fa-twitter"></span>
         </a>
       </div>
       <div class="col-4">
         <a href="" class="btn btn-twitter btn-large btn-caps btn-block">Instagram
           <span class="fa fa-instagram"></span>
         </a>
       </div>
     </div>
   </div>
 </div>
</div>
-->
