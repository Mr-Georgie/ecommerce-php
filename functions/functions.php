<?php

  $db = mysqli_connect("localhost","root","","gracestore_db");


  //begin the get real ip user function
  function getRealIpUser(){

    switch (true) {
      case (!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
        // code...
        break;

      default: return $_SERVER['REMOTE_ADDR'];
        // code...
        break;
    }
  }

  //begin the add cart function
  function add_cart(){
    // code...
    global $db;

    if (isset($_GET['add_cart'])) {
      // code...
      $ip_add = getRealIpUser();

      $p_id = $_GET['add_cart'];

      $product_qty = $_POST['product_qty'];

      $product_size = $_POST['product_size'];

      $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";

      $run_check = @mysqli_query($db,$check_product);

      if (mysqli_num_rows($run_check)>0) {
        // code...
        echo "<script> alert('This product has already been added to cart') </script>";
        echo "<script> window.open('product.php?pro_id=$p_id','_self') </script>";
      }
      else {
        // code...
        $query = "INSERT INTO cart (p_id,ip_add,qty,size) VALUES ('$p_id', '$ip_add', '$product_qty', '$product_size' )";

        $run_query = @mysqli_query($db,$query);

        echo "<script> alert('One product added to cart') </script>";
        echo "<script> window.open('product.php?pro_id=$p_id','_self') </script>";

      }
    }
  }

  //begin the get product function
  function getPro(){

    global $db;

       if (isset($_GET['pageno']) && is_numeric

           ($_GET['pageno'])) {

          $pageno = $_GET['pageno'];

        } else {

           $pageno = 1;
        }

        $no_of_products_per_page = 4;
        $offset = ($pageno - 1) * $no_of_products_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM products";
        $result = @mysqli_query($dbcon,$total_pages_sql);
        $total_rows = @mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_products_per_page);

        $get_products = "SELECT * FROM products order by rand() LIMIT 0,8";

        $run_products = mysqli_query($db,$get_products);

        while ($row_products=mysqli_fetch_array($run_products)){

          $pro_id = $row_products['product_id'];
          $pro_title = $row_products['product_title'];
          $pro_price = $row_products['product_price'];
          $pro_img1 = $row_products['product_img1'];
          $pro_desc = $row_products['product_desc'];

          echo "

          <div class='col-12 col-sm-6 col-md-6 col-lg-3 pb-3'>
            <div class='card h-100'>
              <div class='header'>
                <a href='product.php?pro_id=$pro_id'>
                  <img src='admin/img/products/$pro_img1' alt='products' class='img-fluid'>
                </a>
              </div>
              <div class='body'>
                <h4 class='text-center' style='font-size:;font-weight:400;color:black;'><a href='product.php?pro_id=$pro_id' style='color:black;'> $pro_title </a></h4>
                <h4 class='text-center'>$$pro_price</h4>
                <p class='button'>
                  <a href='product.php?pro_id=$pro_id' class='btn btn-danger'><i class='fa fa-plus' aria-hidden='true'></i>Add to Cart</a>
                </p>
               </div>
              </div>
            </div>

          ";
        }

      }

  //begin the get all product function
  function getAllPro(){

    global $db;

      if (isset($_GET['pageno']) && is_numeric

          ($_GET['pageno'])) {

         $pageno = $_GET['pageno'];

       } else {

          $pageno = 1;
       }

       $no_of_products_per_page = 6;
       $offset = ($pageno - 1) * $no_of_products_per_page;

       $total_pages_sql = "SELECT COUNT(*) FROM products";
       $result = @mysqli_query($dbcon,$total_pages_sql);
       $total_rows = @mysqli_fetch_array($result)[0];
       $total_pages = ceil($total_rows / $no_of_products_per_page);

        $get_products = "SELECT * FROM products order by 1 DESC LIMIT $offset,$no_of_products_per_page";
        $run_products = mysqli_query($db,$get_products);

        while ($row_products=@mysqli_fetch_array($run_products)){

          $pro_id = $row_products['product_id'];
          $pro_title = $row_products['product_title'];
          $pro_price = $row_products['product_price'];
          $pro_img1 = $row_products['product_img1'];
          $pro_desc = $row_products['product_desc'];

          echo "

            <div class='col-sm-6 col-md-4 pb-3'>
              <div class='card h-100'>
                <div class='header'>
                  <a href='product.php?pro_id=$pro_id'>
                    <img src='admin/img/products/$pro_img1' alt='products' class='img-fluid'>
                  </a>
                </div>
                <div class='body'>
                  <h4 class='text-center' style='font-size: 20px;color:black;'><a href='product.php?pro_id=$pro_id' style='color:black;'> $pro_title </a></h4>
                  <h4 class='text-center' style='font-size: 15px;color:black;'>$$pro_price</h4>
                  <p class='button'>
                    <a href='product.php?pro_id=$pro_id' class='btn btn-danger' style='font-size: 13px;'><i class='fa fa-plus' aria-hidden='true'></i>Add to Cart</a>
                  </p>
                 </div>
                </div>
              </div>

          ";
        }

      }
  //end the get product function

  //begin the get product category
  function getPCats(){

    global $db;

    $get_p_cats = "SELECT * FROM product_categories";
    $run_p_cats = mysqli_query($db,$get_p_cats);

    while ($row_p_cats=mysqli_fetch_array($run_p_cats)){

      $p_cat_id = $row_p_cats['p_cat_id'];
      $p_cat_title = $row_p_cats['p_cat_title'];

      echo "

            <a href='category.php?p_cat=$p_cat_id' class='list-group-item'> $p_cat_title </a>

      ";

    }
  }

//begin the get category function
  function getCats(){

    global $db;

    $get_cats = "SELECT * FROM categories";
    $run_cats = mysqli_query($db,$get_cats);

    while ($row_cats=mysqli_fetch_array($run_cats)){

      $cat_id = $row_cats['cat_id'];
      $cat_title = $row_cats['cat_title'];

      echo "

            <a href='category.php?cat=$cat_id' class='list-group-item'> $cat_title </a>

      ";

    }
  }

  //begin the get each product category function
  function getEachPCat(){

    global $db;

    if (isset($_GET['p_cat'])) {

        $p_cat_id = $_GET['p_cat'];

        $get_p_cats = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";

        $run_p_cats = @mysqli_query($db,$get_p_cats);

        $row_p_cats = @mysqli_fetch_array($run_p_cats);

        $p_cat_title = $row_p_cats['p_cat_title'];

        $p_cat_desc = $row_p_cats['p_cat_desc'];

        $get_products = "SELECT * FROM products WHERE p_cat_id='$p_cat_id'";

        $run_products = @mysqli_query($db,$get_products);

        $count = @mysqli_num_rows($run_products);

        if ($count == 0) {
          // code...
          echo "
          <div class='text-center mb-4 pr-4 pl-4 pt-4 pb-2'>
            <h2>$p_cat_title</h2>
            <p>No Product Found In This Category</p>
          </div>
          ";
        } else {

            echo "
            <div class='text-center mb-4 pr-4 pl-4 pt-4 pb-2 col-12'>
              <h2>$p_cat_title</h2>
              <hr style='background:red; width: 100px; height: 2px;'>
              <p>$p_cat_desc</p>
            </div>
            ";
        }

        while ($row_products=@mysqli_fetch_array($run_products)){

          $pro_id = $row_products['product_id'];
          $pro_title = $row_products['product_title'];
          $pro_price = $row_products['product_price'];
          $pro_img1 = $row_products['product_img1'];
          $pro_desc = $row_products['product_desc'];

          echo "

          <div class='col-sm-6 col-md-4 pb-3'>
            <div class='card h-100'>
              <div class='header'>
                <a href='product.php?pro_id=$pro_id'>
                  <img src='admin/img/products/$pro_img1' alt='products' class='img-fluid'>
                </a>
              </div>
              <div class='body'>
                <h4 class='text-center' style='font-size: 20px;color:black;'><a href='product.php?pro_id=$pro_id' style='color:black;'> $pro_title </a></h4>
                <h4 class='text-center' style='font-size: 15px;color:black;'>$$pro_price</h4>
                <p class='button'>
                  <a href='product.php?pro_id=$pro_id' class='btn btn-danger' style='font-size: 13px;'><i class='fa fa-plus' aria-hidden='true'></i>Add to Cart</a>
                </p>
               </div>
              </div>
            </div>

          ";
        }

      }
    }

  //begin the get each category function
  function getEachCat(){

      global $db;

      if (isset($_GET['cat'])) {

          $cat_id = $_GET['cat'];

          $get_cats = "SELECT * FROM categories WHERE cat_id='$cat_id'";

          $run_cats = @mysqli_query($db,$get_cats);

          $row_cats = @mysqli_fetch_array($run_cats);

          $cat_title = $row_cats['cat_title'];

          $cat_desc = $row_cats['cat_desc'];

          $get_products = "SELECT * FROM products WHERE cat_id='$cat_id'";

          $run_products = @mysqli_query($db,$get_products);

          $count = @mysqli_num_rows($run_products);

          if ($count == 0) {
            // code...
            echo "
            <div class='text-center mb-4 pr-4 pl-4 pt-4 pb-2'>
              <h2>$cat_title</h2>
              <p>No Product Found In This Category</p>
            </div>
            ";
          } else {

              echo "
              <div class='text-center mb-4 pr-4 pl-4 pt-4 pb-2 col-12'>
                <h2>$cat_title</h2>
                <hr style='background:red; width: 100px; height: 2px;'>
                <p>$cat_desc</p>
              </div>
              ";
          }

          while ($row_products=@mysqli_fetch_array($run_products)){

            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];
            $pro_desc = $row_products['product_desc'];

            echo "

            <div class='col-sm-6 col-md-4 pb-3'>
              <div class='card h-100'>
                <div class='header'>
                  <a href='product.php?pro_id=$pro_id'>
                    <img src='admin/img/products/$pro_img1' alt='products' class='img-fluid'>
                  </a>
                </div>
                <div class='body'>
                  <h4 class='text-center' style='font-size: 20px;color:black;'><a href='product.php?pro_id=$pro_id' style='color:black;'> $pro_title </a></h4>
                  <h4 class='text-center' style='font-size: 15px;color:black;'>$$pro_price</h4>
                  <p class='button'>
                    <a href='product.php?pro_id=$pro_id' class='btn btn-danger' style='font-size: 13px;'><i class='fa fa-plus' aria-hidden='true'></i>Add to Cart</a>
                  </p>
                 </div>
                </div>
              </div>

            ";
          }

        }
      }


?>
