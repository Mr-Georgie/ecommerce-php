<div class="container-fluid pt-3 pb-3">
  <div class="col-12 text-center">
    <h2>Change Password</h2>
    <p class="text-muted">
      if you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
    </p>
  </div>
  <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Your Old Password:</label>
        <input type="text" name="old_pass" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Your New Password:</label>
        <input type="text" name="new_pass" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Confirm Your New Password:</label>
        <input type="text" name="new_pass_again" class="form-control" required>
      </div>
      <div class="text-center">
        <button type="submit" name="submit" class="btn btn-primary btn-lg">
          <i class="fa fa-user-md"> Update Now</i>
        </button>
      </div>
    </form>
  </div>
</div>

<?php

if (isset($_POST['submit'])) {

  $customer_email = $_SESSION['customer_email'];
  $old_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];
  $new_pass_again = $_POST['new_pass_again'];

  $select_old_pass = "SELECT * FROM customers WHERE Customer_psword='$old_pass'";

  $run_old_pass = @mysqli_query($db, $select_old_pass);

  $check_old_pass = mysqli_fetch_array($run_old_pass);

  if ($check_old_pass==0) {
    // code...
    echo "<script>alert('Sorry, your old password is incorrect. Please try again.')</script>";
    exit();
  }
  if ($new_pass!=$new_pass_again) {
    // code...
    echo "<script>alert('Sorry, your new password did not match. Please try again.')</script>";
    exit();
  }

  $update_c_pass = "UPDATE customers SET Customer_psword='$new_pass' WHERE Customer_email='$customer_email'";

  $run_c_pass = @mysqli_query($db, $update_c_pass);

  if ($run_c_pass) {
    // code...
      echo "<script>alert('Your password has been updated.')</script>";
      echo "<script>window.open('account.php?my_orders', '_self')</script>";
  }

}

 ?>
