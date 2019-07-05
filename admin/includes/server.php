<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "gracestore_db";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['submit'])) {

// receive all input values from the form

$product_title = mysqli_real_escape_string($conn,$_POST['product_title']);

$product_cat = mysqli_real_escape_string($conn,$_POST['product_cat']);

$cat = mysqli_real_escape_string($conn,$_POST['cat']);

$product_img1 = mysqli_real_escape_string($conn,$_POST['product_img1']);

$product_img2 = mysqli_real_escape_string($conn,$_POST['product_img2']);

$product_img3 = mysqli_real_escape_string($conn,$_POST['product_img3']);

$product_price = mysqli_real_escape_string($conn,$_POST['product_price']);

$product_keywords = mysqli_real_escape_string($conn,$_POST['product_keywords']);

$product_details = mysqli_real_escape_string($conn,$_POST['product_desc']);

// Check connection

if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

$sql = "INSERT INTO products ( product_id, product_title, p_cat_id, cat_id, date, product_img1, product_img2, product_img3, product_price, product_keywords, product_desc)

VALUES ('',  '$product_title', '$product_cat', '$cat', NOW(), '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_keywords', '$product_desc')";

if ($conn->query($sql) === TRUE) {

echo "alert('New record created successfully')";

} else {

echo "Error: " . $sql . "<br>" . $conn->error;

}

}

$conn->close();

?>
