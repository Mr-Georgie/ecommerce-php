<!-- Footer -->
<footer class="bg-dark text-white">

 <div class="container pt-5">
  <div class="row">
   <!-- footer widget -->
   <div class="col-md-3 col-sm-6 col-6">
     <div class="footer">
       <!-- footer logo -->
       <div class="footer-logo">
         <a class="logo" href="#">
           <h3 style="color:white">Grace <span style="color:orange;">Stores<i class="fa fa-cart-plus"></i></span></h3>
         </a>
       </div>
       <!-- /footer logo -->

       <p>23, King George IV Street off Ayilara street Lagos Islands, Lagos State, Nigeria</p>
       <!--hr style="background:white;"-->

     </div>
   </div>
   <!-- /footer widget -->

   <!-- footer widget -->
   <div class="col-md-3 col-sm-6 col-6">
     <div class="footer">
       <h4 class="footer-header">Categories</h4>
       <div class="footer-item">
       <?php

       $get_p_cats = "SELECT * FROM product_categories";
       $run_p_cats = mysqli_query($db,$get_p_cats);

       while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
        // code...
        $p_cat_id = $row_p_cats['p_cat_id'];
        $p_cat_title = $row_p_cats['p_cat_title'];

        echo "

        <a href='category.php?p_cat=$p_cat_id' style='color:gray'> $p_cat_title </a><br>

        ";
      }

      ?>
      </div>
    </div>
   </div>
   <!-- /footer widget -->

   <div class="clearfix visible-sm visible-xs"></div>

   <!-- footer widget -->
   <div class="col-md-3 col-sm-6 col-6">
     <div class="footer">
       <h4 class="footer-header">Pages</h4>
       <div class="list-links">
         <a href="#" style="color:gray">About Us</a><br>
         <?php
         if (!isset($_SESSION['customer_email'])) {

            echo "<a href='users/checkout.php' style='color:gray'></i> My Account </a><br>";

         } else {

            echo "<a href='users/account.php?my_orders' style='color:gray'></i> My Account </a><br>";
         }
         ?>
         <a style="color:gray" href="../contact.php">Contact Us</a><br>
         <a style="color:gray" href="cart.php">Shopping Cart</a>
       </div>
     </div>
    </div>
   <!-- /footer widget -->

   <!-- footer subscribe -->
   <div class="col-md-3 col-sm-6 col-6">
     <div class="footer">
       <!-- footer social -->
       <h4 class="footer-header">Keep In Touch</h4>
       <div class="row pt-2 pl-2 social-media">
         <div class="col-2 col-sm-2">
           <a href="#"><i class="fa fa-facebook fa-lg" aria-hidden="true" style="color:white;"></i></a>
         </div>
         <div class="col-2 col-sm-2">
           <a href="#"><i class="fa fa-twitter fa-lg" aria-hidden="true" style="color:white;"></i></a>
         </div>
         <div class="col-2 col-sm-2">
           <a href="#"><i class="fa fa-instagram fa-lg" aria-hidden="true" style="color:white;"></i></a>
         </div>
         <div class="col-2 col-sm-2">
           <a href="#"><i class="fa fa-google-plus fa-lg" aria-hidden="true" style="color:white;"></i></a>
         </div>
         <div class="col-2 col-sm-2">
           <a href="#"><i class="fa fa-envelope fa-lg" aria-hidden="true" style="color:white;"></i></a>
         </div>
       </div>
       <!-- /footer social -->
     </div>
   </div>
   <!-- /footer subscribe -->
 </div>

 <hr />
  <div class="row">
    <div class="col-lg-6">
      <p>Copyright &copy; <a href="ecommerce.html" style="color:orange;">Grace Store Inc.</a> 2019</p>
    </div>
    <div class="col-lg-6">
      <p>Developed and Design by Geo-Stack <a href="../www.facebook.com/geo-stack" style="color:orange;">+234-8126-0133-57 | Geo-Stack@facebook.com</a></p>
    </div>
  </div>
 </div>
</footer>
