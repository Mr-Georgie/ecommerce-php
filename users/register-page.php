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

     <?php
     $active = 'Account';
     include('includes/user-header.php');
     ?>

    <!-- Page Content -->
    <div class="container pb-5 mt-3">
      <div class="row">
        <div class="col-12">
          <ul class="breadcrumb bg-white pl-5 pr-5" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .1); border-radius: 0;">
            <li class="pr-3">
              <a href="../index.php">Home</a>
            </li>
            <li class="pr-3">
              <a href="register-page.php"> <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> Register</a>
            </li>
          </ul>
        </div>
        <div class="d-none d-sm-none d-md-none d-lg-block col-lg-4">
          <div class="container card" style="position: relative; width:100%;">
            <img src="../img/banner14.jpg" alt="products" class="" style="width:100%; height:auto;">
            <div class="text" style="position: absolute; top: 50%; left: 50%; bottom: 220px; transform: translate(-50%,-50%);">
              <h1 style="background: ; color: black;">NEW COLLECTIONS</h1>
              <h4 style="background: ; color: black;">Available</h4>
              <a href="../category.php" class="btn btn-warning"> SHOP NOW </a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-8">
          <div class="card">
            <?php

            if (isset($_POST['submit'])) {

              $errors = array(); // Initialize an error array.
              // code...
              $customer_fname = mysqli_real_escape_string($db, trim($_POST['fname']));
              $customer_lname = mysqli_real_escape_string($db, trim($_POST['lname']));
              $customer_email = mysqli_real_escape_string($db, trim($_POST['email']));

              if ($_POST['psword1'] != $_POST['psword2']) {
              $errors[] = 'Your two passwords did not match.';
              } else {
              $customer_psword = mysqli_real_escape_string($db, trim($_POST['psword1']));
              }

              $customer_ip = getRealIpUser();

              // Make the query:
              $insert_customer = "INSERT INTO customers (customer_id, customer_fname, customer_lname, customer_email, customer_psword, registration_date, customer_ip)
              VALUES (' ', '$customer_fname', '$customer_lname', '$customer_email', '$customer_psword', NOW(), '$customer_ip')";
              $run_customer = @mysqli_query ($db, $insert_customer); // Run the query.

              $sel_cart = "SELECT * FROM cart WHERE ip_add='$customer_ip'";
              $run_cart = @mysqli_query ($db, $sel_cart);
              $check_cart = mysqli_num_rows($run_cart);

              if ($check_cart>0) {

                $_SESSION['customer_email'] = $customer_email;
                // if user has items in cart

                echo "<script>alert('Registration was successful')</script>";
                echo "<script>window.open('cart.php','_self')</script>";
              } else {

                $_SESSION['customer_email'] = $customer_email;
                // if user has no item in cart

                echo "<script>alert('Registration was successful')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
              }
            }
            ?>
            <div class="container-fluid pt-3 pb-3">
              <div class="col-12 text-center">
                <h2>Register</h2>
                <p class="text-muted">
                  if you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
                </p>
              </div>
              <div class="container">
                <form action="register-page.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>First name:</label>
                    <input id="fname" type="text" name="fname" class="form-control" size="30" maxlength="30" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Last name:</label>
                    <input id="lname" type="text" name="lname" class="form-control" size="30" maxlength="30" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Email:</label>
                    <input id="email" type="text" name="email" class="form-control" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
                  </div>
                  <div class="form-group">
                    <label>Password:</label>
                    <input id="psword1" type="password" name="psword1" class="form-control" size="12" maxlength="12" value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>" required>&nbsp; Between 8 and 12 characters.
                  </div>
                  <div class="form-group">
                    <label>Confirm Password:</label>
                    <input id="psword2" type="password" name="psword2" class="form-control" size="12" maxlength="12" value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>" required>&nbsp; Between 8 and 12 characters.
                  </div>
                  <div class="text-center">
                    <button id="submit" type="submit" name="submit" class="btn btn-primary btn-lg">
                      <i class="fa fa-user"> Register</i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include('includes/user-footer.php'); ?>

  </body>
</html>
