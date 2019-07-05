<?php

    if (!isset($_SESSION['admin_email'])) {
      echo "<script> window.open('login.php', '_self') </script>";
    } else {

 ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="header">Dashboard</h1>

      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Dashboard
        </li>
      </ol>
    </div>
  </div>

  <!--market updates end here-->
  <div class="market-updates">
  			<div class="col-lg-3 col-sm-6 col-md-6 market-update-gd">
  				<div class="market-update-block clr-block-1">
            <a href="index.php?view_products" >
              <div class="col-md-8 market-update-left">
    						<h3> <?php echo $count_product; ?> </h3>
    						<h4>Products</h4>
    						<p>View details</p>
    					</div>
    					<div class="col-md-4 market-update-right">
    						<i class="fa fa-tasks fa-4x"> </i>
    					</div>
    				  <div class="clearfix"></div>
  					</a>
  				</div>
  			</div>
        <div class="col-lg-3 col-sm-6 col-md-6 market-update-gd">
  				<div class="market-update-block clr-block-2">
            <a href="index.php?view_customers" style="">
              <div class="col-md-8 market-update-left">
    						<h3><?php echo $count_customer; ?></h3>
    						<h4>Customers</h4>
    						<p>View details</p>
    					</div>
    					<div class="col-md-4 market-update-right">
    						<i class="fa fa-users fa-4x" style=""> </i>
    					</div>
    				  <div class="clearfix"></div>
  					</a>
  				</div>
  			</div>
        <div class="col-lg-3 col-sm-6 col-md-6 market-update-gd">
  				<div class="market-update-block clr-block-3">
            <a href="index.php?view_p_cats" style="">
              <div class="col-md-8 market-update-left">
    						<h3><?php echo $count_p_cats; ?></h3>
    						<h4>Product Categories</h4>
    						<p>View details</p>
    					</div>
    					<div class="col-md-4 market-update-right">
    						<i class="fa fa-tag fa-4x" style=""> </i>
    					</div>
    				  <div class="clearfix"></div>
  					</a>
  				</div>
  			</div>
        <div class="col-lg-3 col-sm-6 col-md-6 market-update-gd">
  				<div class="market-update-block clr-block-4" style="">
            <a href="index.php?view_orders">
              <div class="col-md-8 market-update-left">
    						<h3><?php echo $count_orders; ?></h3>
    						<h4>Orders</h4>
    						<p>View details</p>
    					</div>
    					<div class="col-md-4 market-update-right">
    						<i class="fa fa-shopping-cart fa-4x" style=""> </i>
    					</div>
    				  <div class="clearfix"></div>
  					</a>
  				</div>
  			</div>

  		   <div class="clearfix"> </div>
  		</div>
  <!--market updates end here-->

  <!--mainpage chit-chating-->
  <div class="chit-chat-layer1">
  	<div class="col-md-8 chit-chat-layer1-left">
          <div class="work-progres">
                <div class="chit-chat-heading">
                        <i class="fa fa-money"></i>  New Orders
                </div>
                <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Invoice no.</th>
                        <th>Product ID</th>
                        <th>Product Qty</th>
                        <th>Product Size</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                      $i = 0;

                      $get_all_orders = "SELECT * FROM pending_orders ORDER BY 1 ASC LIMIT 0,4";

                      $run_all_orders = @mysqli_query($con,$get_all_orders);

                      while ($row_all_orders = mysqli_fetch_array($run_all_orders)) {
                        // code...
                        $order_id = $row_all_orders['order_id'];
                        $c_id = $row_all_orders['customer_id'];
                        $invoice_no = $row_all_orders['invoice_no'];
                        $product_id = $row_all_orders['product_id'];
                        $qty = $row_all_orders['qty'];
                        $size = $row_all_orders['size'];
                        $order_status = $row_all_orders['order_status'];

                        $i++;


                       ?>

                      <tr>
                        <td><?php echo $order_id; ?></td>
                        <td>
                          <?php
                          $get_customer = "SELECT * FROM customers WHERE Customer_id='$c_id'";
                          $run_customer = @mysqli_query($con,$get_customer);
                          $row_customer = mysqli_fetch_array($run_customer);
                          $customer_fname = $row_customer['Customer_fname'];
                          $customer_lname = $row_customer['Customer_lname'];
                          echo $customer_fname . ' ' .$customer_lname;
                           ?>
                        </td>
                        <td><?php echo $invoice_no; ?></td>
                        <td><?php echo $product_id; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $size; ?></td>
                        <td><span class="label label-danger">
                          <?php

                          if ($order_status=='Pending') {
                            // code...
                            echo $order_status = 'Pending';
                          } else {
                            // code...
                            echo $order_status = 'Complete';
                          }

                           ?>
                        </span></td>
                        <!--td><span class="badge badge-info">50%</span></td-->
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="chit-chat-footer text-right" style="padding: 15px 0; ">
                        <a href="index.php?view_orders">View All Orders <i class="fa fa-arrow-right"></i> </a>
                </div>
          </div>
    </div>
    <div class="col-md-4 chit-chat-layer1-rit">
      <div class="wrapper-flex">
        <div class="user-marorm">
        <div class="malorum-top">
        </div>
        <div class="malorm-bottom">
          <span class="malorum-pro"> <img src="img/<?php echo $admin_image_1; ?>"></span>
             <h4><?php echo $admin_job; ?></h4>
           <h2> <?php echo $admin_name; ?> </h2>
          <p><?php echo $admin_about; ?></p>
          <p style="color:red; padding-top: 5px;"><i class="fa fa-envelope"></i> Contact: <?php echo $admin_contact; ?></p>
          <p style="color:red; padding-top: 5px;"><i class="fa fa-user"></i> Email: <?php echo $admin_email; ?></p>
        </div>
         </div>
      </div>
    </div>

  </div>

</div>
<?php } ?>
