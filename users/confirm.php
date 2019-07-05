<?php session_start();

    if (!isset($_SESSION['customer_email'])) {
      // code...
      echo "<script>window.open('checkout.php?','_self')</script>";
    } else {
      // code...

?>
<?php
include("../functions/functions.php");

if (isset($_GET['order_id'])) {
  // code...
  $order_id = $_GET['order_id'];

}

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
    <div class="container mt-3 pb-5">
      <div class="row">
        <div class="col-12">
          <ul class="breadcrumb bg-white pl-5 pr-5" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);">
            <li class="pr-3">
              <a href="../index.php">Home</a>
            </li>
            <li class="pr-3">
              <a href="confirm.php"> <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> Confirm Your payment</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <?php include('includes/user-sidebar.php'); ?>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="container-fluid pt-3 pb-3">
              <div class="col-12 text-center">
                <h2>Please confirm your payment</h2>
                <p class="text-muted">
                  if you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
                </p>
              </div>
              <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Invoice No:</label>
                  <input type="text" name="invoice_no" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Amount Sent:</label>
                  <input type="text" name="amount_sent" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Select Payment Mode:</label>
                  <select class="form-control" name="payment_mode">
                    <option disabled selected value=""> Select Payment Mode </option>
                    <option> Paypal </option>
                    <option> Western Union</option>
                    <option> Offline </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Transaction / Reference ID:</label>
                  <input type="text" name="ref_no" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Western Union / Paypal Code:</label>
                  <input type="text" name="code" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Payment Date:</label>
                  <input type="text" name="date" class="form-control" required>
                </div>
                <div class="text-center">
                  <button type="submit" name="confirm_payment" class="btn btn-primary">
                    <i class="fa fa-user-md"> Confirm Payment</i>
                  </button>
                </div>
              </form>

              <?php

              if (isset($_POST['confirm_payment'])) {
                // code...
                $update_id = $_GET['update_id'];
                $invoice_no = $_POST['invoice_no'];
                $amount = $_POST['amount_sent'];
                $payment_mode = $_POST['payment_mode'];
                $ref_no = $_POST['ref_no'];
                $code = $_POST['code'];
                $payment_date = $_POST['date'];

                $complete = "Complete";

                $insert_payment = "INSERT INTO payments (invoice_no,amount,payment_mode,ref_no,code,payment_date)
                VALUES ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

                $run_payment = @mysqli_query($db, $insert_payment);

                $update_customer_order = "UPDATE customer_orders SET order_status='$complete' WHERE order_id='$update_id'";

                $run_customer_order = @mysqli_query($db, $update_customer_order);

                $update_pending_order = "UPDATE pending_orders SET order_status='$complete' WHERE order_id='$update_id'";

                $run_pending_order = @mysqli_query($db, $update_pending_order);

                if ($run_pending_order) {
                  // code...
                    echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 working hours')</script>";
                    echo "<script>window.open('account.php?my_orders', '_self')</script>";
                }

               }

               ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- div element with the content as id and a .container class -->

    <?php include('includes/user-footer.php'); ?>

  </body>
</html>
<?php } ?>
