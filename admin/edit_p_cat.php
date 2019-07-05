<?php

    if (!isset($_SESSION['admin_email'])) {
      echo "<script> window.open('login.php', '_self') </script>";
    } else {

?>
<?php

    if (isset($_GET['edit_p_cat'])) {

      $edit_id = $_GET['edit_p_cat'];
      $get_p_cats = "SELECT * FROM product_categories WHERE p_cat_id='$edit_id'";
      $run_edit = @mysqli_query($con,$get_p_cats);
      $row_edit = mysqli_fetch_array($run_edit);
      $product_cat_id = $row_edit['p_cat_id'];
      $product_cat_title = $row_edit['p_cat_title'];
      $product_cat_desc = $row_edit['p_cat_desc'];
    }


 ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="header"><!--i class="fa fa-money fa-fw"></i--> Edit Product Category</h1>

      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Dashboard / Edit Product Category
        </li>
      </ol>
    </div>
  </div>

  <div class="row">

    <div class="col-lg-12">

      <div class="box" style="background: #fff;box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15); padding: 20px 95px;">

        <form method="post" enctype="multipart/form-data" action="">

          <div class="form-group row">

            <label class="col-md-4 col-form-label"> <strong> Product Category Title </strong></label>

            <div class="col-md-8">

              <input type="text" name="p_cat_title" class="form-control" value="<?php echo $product_cat_title; ?>" required>

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-4 col-form-label"> <strong> Product Category Description </strong></label>

            <div class="col-md-8">

              <textarea name="p_cat_desc" rows="10" cols="30" class="form-control" required><?php echo $product_cat_desc; ?></textarea>

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-4 col-form-label"></label>

            <div class="col-md-8">

              <input type="submit" name="update" value="Submit" class="btn btn-primary form-control">

            </div>

          </div>

        </form>

      </div>

    </div>

  </div>
</div>


<?php

      if (isset($_POST['update'])) {

      // receive all input values from the form

          $p_cat_title = mysqli_real_escape_string($con,$_POST['p_cat_title']);

          $p_cat_desc = mysqli_real_escape_string($con,$_POST['p_cat_desc']);

          $update_p_cat = "UPDATE product_categories SET p_cat_title='$p_cat_title', p_cat_desc='$p_cat_desc' WHERE p_cat_id='$product_cat_id'";

          $run_p_cat = @mysqli_query($con,$update_p_cat);

          if ($run_p_cat) {
            // code...

          echo "<script>alert('Product Category has been updated successful')</script>";
          echo "<script>window.open('index.php?view_p_cats','_self')</script>";

        } else {
          // code...
          echo $con->error;
        }

      }


?>
<?php } ?>
