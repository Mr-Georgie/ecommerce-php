<div class="container-fluid pt-3 pb-3">
  <div class="col-12 text-center">
    <h2>Do You Really Want to Delete Your Account?</h2>
  </div>
  <div class="container pt-2 pb-2">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="text-center">
        <input type="submit" name="Yes" value="Yes, I want to" class="btn btn-danger">

        <input type="submit" name="No" value="No, I don't" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>

<?php

  $customer_session = $_SESSION['customer_email'];

  if (isset($_POST['Yes'])) {
    // code...
    $delete_customer = "DELETE FROM customers WHERE customer_email='$customer_session'";
    $run_delete = @mysqli_query($db, $delete_customer);

    if ($run_delete) {
      // code...
      echo "<script>alert('You have successfully deleted your account. Do create another to enjoy AWESOME discounts')</script>";
      echo "<script>window.open('logout.php', '_self')</script>";
    }
  }

  if (isset($_POST['No'])) {
    // code...
    echo "<script>window.open('account.php?my_orders', '_self')</script>";
  }

 ?>
