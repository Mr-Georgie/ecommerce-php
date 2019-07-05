<div class="container">
  <?php

    $session_email = $_SESSION['customer_email'];

    $select_customer = "SELECT * FROM customers WHERE customer_email='$session_email'";

    $run_customer = @mysqli_query($db,$select_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['Customer_id'];

   ?>
  <h1 class="text-center">Payment option for you</h1>
  <p class="text-center" style="font-size:30px;">
    <a href="order.php?c_id=<?php echo $customer_id; ?>">Offline Payment</a>
  </p>
  <p class="text-center" style="font-size:30px;">
    <a href="#">
      Paypal Payment
      <img src="../img/paypal.png" alt="paypal-logo" class="img-fluid">
    </a>
  </p>
</div>
