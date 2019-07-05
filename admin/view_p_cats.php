<?php

    if (!isset($_SESSION['admin_email'])) {
      echo "<script> window.open('login.php', '_self') </script>";
    } else {

?>
<div class="product-block container">
  <div class="row">
    <div class="col-12">
      <h1 class="header"><i class="fa fa-tags"></i> View Product Category</h1>

      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Dashboard / View Product Category
        </li>
      </ol>
    </div>
  </div>

  <div class="row">

    <div class="">

      <div class="box">

        <div class="table-responsive">
          <table class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th>Product Category ID</th>
                <th>Product Category Title</th>
                <th>Product Category Desc</th>
                <th>Edit Product Category</th>
                <th>Delete Product Category</th>
              </tr>
            </thead>
            <tbody>

              <?php

              $i = 0;

              $get_p_cats = "SELECT * FROM product_categories";

              $run_p_cats = @mysqli_query($con,$get_p_cats);

              while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                // code...
                $p_cat_id = $row_p_cats['p_cat_id'];
                $p_cat_title = $row_p_cats['p_cat_title'];
                $p_cat_desc = $row_p_cats['p_cat_desc'];

                $i++;


               ?>

              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $p_cat_title; ?></td>
                <td width="300"> <?php echo $p_cat_desc; ?></td>
                <td>
                  <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
                    <i class="fa fa-pencil"></i> Edit
                  </a>
                </td>
                <td>
                  <a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
                    <i class="fa fa-trash-o"></i> Delete
                  </a>
                </td>
                <!--td><span class="badge badge-info">50%</span></td-->
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>

    </div>

  </div>

  <div class="clearfix"> </div>
</div>
<?php } ?>
