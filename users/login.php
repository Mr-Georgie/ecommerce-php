<div class="container-fluid pt-3 pb-3">
  <div class="col-12 text-center">
    <h2>Sign In</h2>
    <p class="text-muted">
      if you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
    </p>
  </div>
  <div class="container">
    <form class="form-signin" role="form" enctype="multipart/form-data" action="checkout.php" method="post">
      <h3 class="form-signin-heading"></h3>
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email address" required>
       </div>
       <div class="form-group">
         <input type="password" name="psword" class="form-control" placeholder="Password" required>
       </div>
       <div class="checkbox">
         <label>
           <input type="checkbox" value="remember-me"> Remember me
         </label>
       </div>
       <div class="text-center">
         <button type="submit" name="login" class="btn btn-primary">
           <i class="fa fa-sign-in"> Log In</i>
         </button>
       </div>
    </form>
  </div>
  <div class="row container">
    <div class="col-12 ml-2">
      <p>Don't have an account? <a href="register-page.php">Register Now!</a></p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-4">
      <a href="#" class="btn btn-facebook btn-large btn-caps btn-block">Facebook <span class="fa fa-facebook"></span></a>
    </div>
    <div class="col-sm-4">
      <a href="" class="btn btn-twitter btn-large btn-caps btn-block">Twitter
        <span class="fa fa-twitter"></span>
      </a>
    </div>
    <div class="col-sm-4">
      <a href="" class="btn btn-twitter btn-large btn-caps btn-block">Instagram
        <span class="fa fa-instagram"></span>
      </a>
    </div>
  </div>
</div>
<?php
if (isset($_POST['login'])) {

  $errors = array(); // Initialize an error array.
  // code...
  $customer_email = $_POST['email'];
  $customer_psword = $_POST['psword'];
  $select_customer = "SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_psword='$customer_psword'";
  $run_customer = @mysqli_query($db, $select_customer);
  $get_ip = getRealIpUser();
  $check_customer = mysqli_num_rows($run_customer);
  $select_cart = "SELECT * FROM cart WHERE ip_add='$get_ip'";
  $run_cart = @mysqli_query($db, $select_cart);
  $check_cart = mysqli_num_rows($run_cart);

  if ($check_customer==0) {
    // code...
    echo "<script>alert('Your email or password is wrong. Please try again')</script>";
    exit();
  }
  if ($check_customer==1 AND $check_cart==0) {

    $_SESSION['customer_email'] = $customer_email;
    // code...
    echo "<script>alert('Your are logged in')</script>";
    echo "<script>window.open('account.php?my_orders','_self')</script>";
  } else {
    // code...
    $_SESSION['customer_email'] = $customer_email;
    // code...
    echo "<script>alert('Your are logged in')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  }
}
 ?>
