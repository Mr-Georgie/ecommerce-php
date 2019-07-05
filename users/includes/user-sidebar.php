<div class="card sidebar-menu">
  <div class="card-header bg-light">
    <?php

      $customer_session = $_SESSION['customer_email'];

      $get_customer = "SELECT * FROM customers WHERE customer_email='$customer_session'";

      $run_customer = @mysqli_query($db, $get_customer);

      $row_customer = mysqli_fetch_array($run_customer);

      $customer_name = $row_customer['Customer_fname'];

      if (!isset($_SESSION['customer_email'])) {
        // code...
      } else {
        // code...
        echo "

            <h3 class=''>
              Hi $customer_name!
            </h3>
        ";
      }
     ?>
  </div>
  <div class="list-group list-group-flush">
    <div class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
      <a href="account.php?my_orders" class="list-group-item">
        <i class="fa fa-list"></i> My Orders
      </a>
    </div>
    <div class="<?php if(isset($_GET['pay_offline'])){ echo "active"; } ?>">
      <a href="account.php?pay_offline" class="list-group-item">
        <i class="fa fa-bolt"></i> Pay Offline
      </a>
    </div>
    <div class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
      <a href="account.php?edit_account" class="list-group-item">
        <i class="fa fa-pencil"></i> Edit Acoount
      </a>
    </div>
    <div class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
      <a href="account.php?change_pass" class="list-group-item">
        <i class="fa fa-user"></i> Change Password
      </a>
    </div>
    <div class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
      <a href="account.php?delete_account" class="list-group-item">
        <i class="fa fa-trash-o"></i> Delete Account
      </a>
    </div>
    <div class="">
      <a href="logout.php" class="list-group-item">
        <i class="fa fa-sign-out"></i> Log out
      </a>
    </div>
  </div>
</div>
