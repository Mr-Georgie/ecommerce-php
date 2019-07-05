<div class="container-fluid pt-3 pb-3">
  <div class="col-12 text-center">
    <h2>My Orders</h2>
    <h5>All your orders in one place</h5>
    <p class="text-muted">
      if you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
    </p>
  </div>
  <div class="container table-responsive">
    <table class="table table-responsive table-bordered table-hover">
      <thead>
        <tr>
          <th> ON: </th>
          <th> Due Amount: </th>
          <th> Invoice Number</th>
          <th> Qty: </th>
          <th> Size: </th>
          <th> Order Date: </th>
          <th> Paid / Unpaid: </th>
          <th> Status: </th>
        </tr>
      </thead>
      <tbody>
        <?php

          $customer_session = $_SESSION['customer_email'];

          $get_customer = "SELECT * FROM customers WHERE customer_email='$customer_session'";

          $run_customer = @mysqli_query($db, $get_customer);

          $row_customer = mysqli_fetch_array($run_customer);

          $customer_id = $row_customer['Customer_id'];

          $get_orders = "SELECT * FROM customer_orders WHERE customer_id='$customer_id'";

          $run_orders = @mysqli_query($db, $get_orders);

          $i = 0;

          while ($row_orders = mysqli_fetch_array($run_orders)) {
            // code...
            $order_id = $row_orders['order_id'];
            $due_amount = $row_orders['due_amount'];
            $invoice_no = $row_orders['invoice_no'];
            $qty = $row_orders['qty'];
            $size = $row_orders['size'];
            $order_date = substr($row_orders['order_date'],0,11);
            $order_status = $row_orders['order_status'];

            $i++;

            if ($order_status=='Pending') {
              // code...
              $order_status = 'Unpaid';
            } else {
              // code...
              $order_status = 'Paid';
            }
         ?>
        <tr>
          <th> <?php echo $i; ?></th>

          <td> $<?php echo $due_amount; ?></td>
          <td> <?php echo $invoice_no; ?> </td>
          <td> <?php echo $qty; ?> </td>
          <td> <?php echo $size; ?> </td>
          <td> <?php echo $order_date; ?> </td>
          <td> <?php echo $order_status; ?> </td>
          <td>
            <a href="confirm.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn-sm"> Confirm Paid </a>
          </td>
        </tr>
        <?php }

        ?>
      </tbody>
    </table>
  </div>
</div>
