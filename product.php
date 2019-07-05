<?php

session_start();
include("functions/functions.php");

?>
<?php  ini_set("display_errors","off");  ?>
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
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome-icons/node_modules/font-awesome/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">


  </head>
  <body>
    <!-- jQuery -->
    <script src="jquery/dist/jquery.slim.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <?php include('includes/header.php'); ?>

    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <ul class="breadcrumb bg-white pl-5 pr-5" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .1); border-radius:0;">
            <li class="pr-3">
              <a href="index.php">Home</a>
            </li>
            <li class="pr-3">
              <a href="category.php"> <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> Categories</a>
            </li>
            <li class="pr-3">
              <a href="category.php?p_cat=<?php echo $p_cat_id; ?>"> <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> <?php echo $p_cat_title; ?></a>
            </li>
            <li class="pr-3">
              <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> <?php echo $pro_title; ?>
            </li>
          </ul>
        </div>
        <div class="col-sm-12 col-md-3">
          <?php include('includes/sidebar.php'); ?>
        </div>
        <div class="col-md-9">
          <div class="container pb-5 pt-4" style="border: solid 1px #e6e6e6;box-sizing: border-box;background:white; padding: 15px;">
            <div class="row">
              <div class="col-sm-6  pb-2 pt-2">
                <!-- carousel container -->
                <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block img-fluid" src="admin/img/products/<?php echo $pro_img1; ?>" alt="First slide" style="height: 350px;width: 100%;">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block img-fluid" src="admin/img/products/<?php echo $pro_img2; ?>" alt="Second slide" style="height: 350px;width: 100%;">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block img-fluid" src="admin/img/products/<?php echo $pro_img3; ?>" alt="Third slide" style="height: 350px;width: 100%;">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <!-- /carousel container -->
                <div class="row mb-2">
                  <div class="col-4">
                    <a href="#" data-target="#carouselExampleIndicators" data-slide-to="0">
                      <img src="admin/img/products/<?php echo $pro_img1; ?>" alt="Shoes" class="img-thumbnail img-fluid" style="height: 120px;width: 100%; box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);">
                    </a>
                  </div>
                  <div class="col-4">
                    <a href="#" data-target="#carouselExampleIndicators" data-slide-to="1">
                      <img src="admin/img/products/<?php echo $pro_img2; ?>" alt="Shoes" class="img-thumbnail img-fluid" style="height: 120px;width: 100%; box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);">
                    </a>
                  </div>
                  <div class="col-4">
                    <a href="#" data-target="#carouselExampleIndicators" data-slide-to="2">
                      <img src="admin/img/products/<?php echo $pro_img3; ?>" alt="Shoes" class="img-thumbnail img-fluid" style="height: 120px;width: 100%; box-shadow: 0px 2px 5px rgba(0, 0, 0, .3);">
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 pt-2">
               <h2 class="text-center pb-2"><a href="product.php"><?php echo $pro_title; ?></a></h2>
               <h4 class="text-center">$<?php echo $pro_price; ?></h4>
               <p class="text-center"><?php echo $pro_desc; ?></p>

               <?php add_cart() ?>
               <?php

               if (!isset($_GET['pro_id'])) {

                 echo "<script> window.open('category.php', '_self') </script>";

               }

                ?>
              <form role="form" class="form-horizontal" method="post" action="product.php?add_cart=<?php echo $product_id; ?>">
                <div class="form-group">
                  <label class="control-label" for="number">Quantity</label>
                  <select id="quantity" class="form-control" name="product_qty">
                  <option name="qty">1</option>
                  <option name="qty">2</option>
                  <option name="qty">3</option>
                  <option name="qty">4</option>
                  <option name="qty">5</option>
                  </select>
                </div>
               <div class="form-group">
                 <label class="control-label">Size</label>
                 <select class="form-control" name="product_size" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')">
                 <option disabled selected value="">Select Size</option>
                 <option >Small</option>
                 <option >Medium</option>
                 <option >Large</option>
                 <option >Extra-Large</option>
                 </select>
               </div>
               <div class="form-group text-center">
                 <button type="submit" class="btn btn-success">Add to Cart</button>
               </div>
             </form>
             <div class="">
               <h6>Sizes available</h6>
               <ul>
                 <li>Small</li>
                 <li>Medium</li>
                 <li>Large</li>
                 <li>Extra-Large</li>
               </ul>
             </div>
            </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 mt-5">
          <div class="container card mb-3" style="padding: 15px;">
            <div class='row'>
              <div class='col-12 text-center pr-4 pl-4 pt-4 pb-2'>
                  <h2>Other Products You May Want To Buy</h2>
                  <hr style='background:red; width: 100px; height: 2px;'>
              </div>
                  <?php

                  $get_products = "SELECT * FROM products order by rand() LIMIT 0,4";
                  $run_products = mysqli_query($db,$get_products);

                  while ($row_products=mysqli_fetch_array($run_products)){

                    $pro_id = $row_products['product_id'];
                    $pro_title = $row_products['product_title'];
                    $pro_price = $row_products['product_price'];
                    $pro_img1 = $row_products['product_img1'];
                    $pro_desc = $row_products['product_desc'];

                    echo "

                    <div class='col-sm-6 col-md-3 pb-5'>
                      <div class='card h-100'>
                        <div class='header'>
                          <a href='product.php?pro_id=$pro_id'>
                            <img src='admin/img/products/$pro_img1' alt='products' class='img-fluid card-img-top' style='height:250px; width:100%;'>
                          </a>
                        </div>
                        <div class='body'>
                          <h4 class='text-center' style='font-size:;font-weight:400;color:black;'><a href='product.php?pro_id=$pro_id' style='color:black;'> $pro_title </a></h4>
                          <h4 class='text-center'>$$pro_price</h4>
                          <p class='button text-center'>
                            <a href='product.php?pro_id=$pro_id' class='btn btn-danger'><i class='fa fa-plus' aria-hidden='true'></i>Add to Cart</a>
                          </p>
                         </div>
                        </div>
                      </div>

                    ";
                  }
                  ?>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('includes/footer.php'); ?>

  </body>
</html>
