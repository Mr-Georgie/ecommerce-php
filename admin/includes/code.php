<?php

if (isset($_POST['submit'])) {
  // code...
  $product_title = mysqli_real_escape_string($con,$_POSt['product_title']);
  $product_cat = $_POSt['product_cat'];
  $cat = $_POSt['cat'];
  $product_price = mysqli_real_escape_string($con,$_POSt['product_price']);
  $product_keywords = mysqli_real_escape_string($con,$_POSt['product_keywords']);
  $product_desc = mysqli_real_escape_string($con,$_POSt['product_desc']);

  $product_img1 = $_FILES['product_img1']['name'];
  $product_img2 = $_FILES['product_img2']['name'];
  $product_img3 = $_FILES['product_img3']['name'];
  $product_img4 = $_FILES['product_img4']['name'];

  $temp_name1 = $_FILES['product_img1']['tmp_name'];
  $temp_name2 = $_FILES['product_img2']['tmp_name'];
  $temp_name3 = $_FILES['product_img3']['tmp_name'];
  $temp_name4 = $_FILES['product_img4']['tmp_name'];

  move_uploaded_file($temp_name1,"img/products/$product_img1");
  move_uploaded_file($temp_name2,"img/products/$product_img2");
  move_uploaded_file($temp_name3,"img/products/$product_img3");
  move_uploaded_file($temp_name4,"img/products/$product_img4");

  $insert_product = "INSERT INTO products (product_id, p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_keywords, product_desc)
  VALUES ('', '$product_cat', '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_keywords', '$product_desc')";

  $run_product = mysqli_query($con,$insert_product);

  if ($run_product) {
    // code...
    echo "<script>alert('Product has been added successful')</script>";
    echo "<script>window.open('insert_product.php','_self')</script>";
    }
    else { // If it did not run
      // Message:
    echo "<script>alert('System Error')</script>";
        // Debugging message:
        echo '<p>' . mysqli_error($con) . '<br><br>Query: ' . $run_product . '</p>';
        }

}

 ?>
