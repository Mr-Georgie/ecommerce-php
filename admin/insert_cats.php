<?php

    if (!isset($_SESSION['admin_email'])) {
      echo "<script> window.open('login.php', '_self') </script>";
    } else {

 ?>
<div class="container" style="margin-bottom:100px;">
  <div class="row">
    <div class="col-12" style="margin-bottom:60px;">
      <h1 class="header"><!--i class="fa fa-money fa-fw"></i--> Insert Category</h1>

      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Dashboard / Insert Category
        </li>
      </ol>
    </div>
  </div>

  <div class="row">

    <div class="col-lg-12">

      <div class="box" style="background: #fff;box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15); padding: 40px 95px;">

        <form method="post" enctype="multipart/form-data" action="">

          <div class="form-group row">

            <label class="col-md-3 col-form-label"> <strong> Category Title </strong></label>

            <div class="col-md-9">

              <input type="text" name="cat_title" class="form-control" required>

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-3 col-form-label"> <strong> Category Description </strong></label>

            <div class="col-md-9">

              <textarea name="cat_desc" rows="10" cols="30" class="form-control" required></textarea>

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-3 col-form-label"></label>

            <div class="col-md-9">

              <input type="submit" name="submit" value="Submit" class="btn btn-primary form-control">

            </div>

          </div>

        </form>

      </div>

    </div>

  </div>

</div>


<?php

if (isset($_POST['submit'])) {

// receive all input values from the form

$cat_title = $_POST['cat_title'];

$cat_desc = $_POST['cat_desc'];

// Check connection

if ($con->connect_error) {

die("Connection failed: " . $con->connect_error);

}

$sql = "INSERT INTO categories ( cat_title, cat_desc) VALUES ('$cat_title','$cat_desc')";

if ($con->query($sql) === TRUE) {

echo "<script>alert('Your new product category has been inserted')</script>";
echo "<script>window.open('index.php?view_cats','_self')</script>";

} else {

echo "Error: " . $sql . "<br>" . $con->error;

}

}

$con->close();

?>
<?php } ?>
