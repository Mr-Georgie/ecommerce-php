<?php

    if (!isset($_SESSION['admin_email'])) {
      echo "<script> window.open('login.php', '_self') </script>";
    } else {

?>
<?php

    if (isset($_GET['edit_product'])) {

      $edit_id = $_GET['edit_product'];
      $get_p = "SELECT * FROM products WHERE product_id='$edit_id'";
      $run_edit = @mysqli_query($con,$get_p);
      $row_edit = mysqli_fetch_array($run_edit);
      $p_id = $row_edit['product_id'];
      $p_cat_id = $row_edit['p_cat_id'];
      $cat_id = $row_edit['cat_id'];
      $p_title = $row_edit['product_title'];
      $p_img1 = $row_edit['product_img1'];
      $p_img2 = $row_edit['product_img2'];
      $p_img3 = $row_edit['product_img3'];
      $p_price = $row_edit['product_price'];
      $p_keywords = $row_edit['product_keywords'];
      $p_desc = $row_edit['product_desc'];
    }

    $get_p_cats = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";
    $run_p_cats = @mysqli_query($con,$get_p_cats);
    $row_p_cats = mysqli_fetch_array($run_p_cats);
    $p_cat_title = $row_p_cats['p_cat_title'];

    $get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";
    $run_cat = mysqli_query($con,$get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat['cat_title'];


 ?>
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="header"><!--i class="fa fa-money fa-fw"></i--> Edit Product</h1>

      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Dashboard / Edit Products
        </li>
      </ol>
    </div>
  </div>

  <div class="row">

    <div class="col-lg-12">

      <div class="box" style="background: #fff;box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15); padding: 65px;">

        <form method="post" enctype="multipart/form-data">

          <div class="form-group row">

            <label class="col-md-2 col-form-label"> <strong> Product Title </strong></label>

            <div class="col-md-10">

              <input type="text" name="product_title" class="form-control" required value="<?php echo $p_title; ?>">

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-2 col-form-label"> <strong> Product Category </strong></label>

            <div class="col-md-10">

              <select class="form-control" name="product_cat" required>

                <option value="<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?></option>

                <?php

                $get_p_cats = "SELECT * FROM product_categories";
                $run_p_cats = mysqli_query($con,$get_p_cats);

                while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
                 // code...
                 $p_cat_id = $row_p_cats['p_cat_id'];
                 $p_cat_title = $row_p_cats['p_cat_title'];

                 echo "

                 <option value='$p_cat_id'> $p_cat_title </option>

                 ";
               }

               ?>

              </select>

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-2 col-form-label"> <strong> Category </strong></label>

            <div class="col-md-10">

              <select class="form-control" name="cat" required>

                <option value="<?php echo $cat_id; ?>"> <?php echo $cat_title; ?> </option>

                <?php

                $get_cat = "SELECT * FROM categories";
                $run_cat = mysqli_query($con,$get_cat);

                while ($row_cat=mysqli_fetch_array($run_cat)) {
                 // code...
                 $cat_id = $row_cat['cat_id'];
                 $cat_title = $row_cat['cat_title'];

                 echo "

                 <option value='$cat_id'> $cat_title </option>

                 ";
               }

               ?>

              </select>

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-2 col-form-label"> <strong> Product Image 1 </strong></label>

            <div class="col-md-10">

              <input type="file" name="product_img1" class="" required>

              <br>

              <img src="img/products/<?php echo $p_img1; ?>" alt="<?php echo $p_title; ?>" width="70" height="70">

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-2 col-form-label"> <strong> Product Image 2 </strong></label>

            <div class="col-md-10">

              <input type="file" name="product_img2" class="" required>

              <br>

              <img src="img/products/<?php echo $p_img2; ?>" alt="<?php echo $p_title; ?>" width="70" height="70">

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-2 col-form-label"> <strong> Product Image 3 </strong></label>

            <div class="col-md-10">

              <input type="file" name="product_img3" class="" required>

              <br>

              <img src="img/products/<?php echo $p_img3; ?>" alt="<?php echo $p_title; ?>" width="70" height="70">

            </div>

          </div>

          <!--div class="form-group row">

            <label class="col-md-2 col-form-label"> <strong> Product Image 4 </strong></label>

            <div class="col-md-10">

              <input type="file" name="product_img4" class="">

            </div>

          </div-->

          <div class="form-group row">

            <label class="col-md-2 col-form-label"> <strong> Product Price </strong></label>

            <div class="col-md-10">

              <input type="text" name="product_price" class="form-control" required value="<?php echo $p_price; ?>">

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-2 col-form-label"> <strong> Product Keywords </strong></label>

            <div class="col-md-10">

              <input type="text" name="product_keywords" class="form-control" required value="<?php echo $p_keywords; ?>">

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-2 col-form-label"> <strong> Product Desc </strong></label>

            <div class="col-md-10">

              <textarea name="product_desc" rows="6" cols="19" class="form-control" required><?php echo $p_desc; ?></textarea>

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-2 col-form-label"></label>

            <div class="col-md-10">

              <input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">

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

$product_title = mysqli_real_escape_string($con,$_POST['product_title']);

$product_cat = mysqli_real_escape_string($con,$_POST['product_cat']);

$cat = mysqli_real_escape_string($con,$_POST['cat']);

$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$product_img3 = $_FILES['product_img3']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];
$temp_name3 = $_FILES['product_img3']['tmp_name'];

move_uploaded_file($temp_name1,"img/products/$product_img1");
move_uploaded_file($temp_name2,"img/products/$product_img2");
move_uploaded_file($temp_name3,"img/products/$product_img3");

$product_price = mysqli_real_escape_string($con,$_POST['product_price']);

$product_keywords = mysqli_real_escape_string($con,$_POST['product_keywords']);

$product_desc = mysqli_real_escape_string($con,$_POST['product_desc']);

// Check connection

if ($con->connect_error) {

die("Connection failed: " . $con->connect_error);

}

$update_product = "UPDATE products SET p_cat_id='$product_cat',cat_id='$cat',product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',
product_img3='$product_img3',product_price='$product_price',product_keywords='$product_keywords',product_desc='$product_desc',date=NOW() WHERE product_id='$p_id'";

$run_update = @mysqli_query($con,$update_product);

if ($run_update) {
  // code...

echo "<script>alert('Product has been updated successful')</script>";
echo "<script>window.open('index.php?view_products','_self')</script>";

} else {

echo "Error: " . $update_product . "<br>" . $con->error;

}

}


?>
<?php } ?>
