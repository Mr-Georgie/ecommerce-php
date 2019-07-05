<?php

    if (!isset($_SESSION['admin_email'])) {
      echo "<script> window.open('login.php', '_self') </script>";
    } else {

 ?>
<div class="container" style="margin-bottom:100px;">
  <div class="row">
    <div class="col-12" style="margin-bottom:60px;">
      <h1 class="header"><!--i class="fa fa-money fa-fw"></i--> Insert Slide</h1>

      <ol class="breadcrumb">
        <li class="active">
          <i class="fa fa-dashboard"></i> Dashboard / Insert Slide
        </li>
      </ol>
    </div>
  </div>

  <div class="row">

    <div class="col-lg-12">

      <div class="box" style="background: #fff;box-shadow: 0px 0px 2px 1px rgba(0,0,0,0.15); padding: 40px 95px;">

        <form method="post" enctype="multipart/form-data" action="">

          <div class="form-group row">

            <label class="col-md-3 col-form-label"> <strong> Slide Name </strong></label>

            <div class="col-md-9">

              <input type="text" name="slide_name" class="form-control" required>

            </div>

          </div>

          <div class="form-group row">

            <label class="col-md-3 col-form-label"> <strong> Slide Image </strong></label>

            <div class="col-md-9">

              <input type="file" name="slide_image" class="" required>

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

$slide_name = $_POST['slide_name'];

$slide_image = $_FILES['slide_image']['name'];

$tmp_name = $_FILES['slide_image']['tmp_name'];

$view_slides = "SELECT * FROM slider";



// Check connection

if ($con->connect_error) {

die("Connection failed: " . $con->connect_error);

}

$sql = "INSERT INTO categories ( cat_title, cat_desc) VALUES ('$cat_title','$cat_desc')";

if ($con->query($sql) === TRUE) {

echo "<script>alert('Your new product category has been inserted')</script>";
echo "<script>window.open('index.php?i','_self')</script>";

} else {

echo "Error: " . $sql . "<br>" . $con->error;

}

}

$con->close();

?>
<?php } ?>
