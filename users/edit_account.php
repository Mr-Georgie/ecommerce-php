<?php

    $customer_session = $_SESSION['customer_email'];

    $get_customer = "SELECT * FROM customers WHERE customer_email='$customer_session'";

    $run_customer = @mysqli_query($db, $get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['Customer_id'];

    $customer_fname = $row_customer['Customer_fname'];

    $customer_lname = $row_customer['Customer_lname'];

    $customer_email = $row_customer['Customer_email'];

 ?>
<div class="container-fluid pt-3 pb-3">
  <div class="col-12 text-center">
    <h2>Edit Your Account</h2>
    <p class="text-muted">
      if you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
    </p>
  </div>
  <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>First name:</label>
        <input type="text" name="fname" class="form-control" value="<?php echo $customer_fname; ?>" required>
      </div>
      <div class="form-group">
        <label>Last name:</label>
        <input type="text" name="lname" class="form-control" value="<?php echo $customer_lname; ?>" required>
      </div>
      <div class="form-group">
        <label>Email:</label>
        <input type="text" name="email" class="form-control" value="<?php echo $customer_email; ?>" required>
      </div>
      <div class="text-center">
        <button type="submit" name="update" class="btn btn-primary btn-lg">
          <i class="fa fa-user-md"> Update Account</i>
        </button>
      </div>
    </form>
  </div>
</div>
<?php

    if (isset($_POST['update'])) {

      $update_id = $customer_id;
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];

      $update_customer = "UPDATE customers SET Customer_fname='$fname',Customer_lname='$lname',Customer_email='$email' WHERE customer_id='$update_id'";

      $run_customer_update = @mysqli_query($db, $update_customer);

      if ($run_customer_update) {
        // code...
          echo "<script>alert('Your account has been edited. To complete the process, please re-login')</script>";
          echo "<script>window.open('logout.php', '_self')</script>";
      }

    }



 ?>
