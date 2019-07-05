<?php
// The link to the database is moved to the top of the PHP code.
require ('../mysqli_connect.php'); // Connect to the db.
// This query INSERTs a record in the users table.

// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $errors = array(); // Initialize an error array.
 // Check for a first name
 if (empty($_POST['fname'])) {
 $errors[] = 'You forgot to enter your first name.';
 } else {
 $fn = mysqli_real_escape_string($dbcon, trim($_POST['fname']));

 }
 // Check for a last name
 if (empty($_POST['lname'])) {
 $errors[] = 'You forgot to enter your last name.';
 } else {
 $ln = mysqli_real_escape_string($dbcon, trim($_POST['lname']));
 }
 // Check for an email address
 if (empty($_POST['email'])) {
 $errors[] = 'You forgot to enter your email address.';
 } else {
 $e = mysqli_real_escape_string($dbcon, trim($_POST['email']));
 }
 // Check for a password and match it against the confirmed password
 if (!empty($_POST['psword1'])) {
 if ($_POST['psword1'] != $_POST['psword2']) {
 $errors[] = 'Your two passwords did not match.';
 } else {
 $p = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
 }
 } else {
 $errors[] = 'You forgot to enter your password.';
 }

 $user_ip = getRealIpUser();

 if (empty($errors)) { // If it runs
 // Register the user in the database...
// Make the query:
$q = "INSERT INTO users (user_id, fname, lname, email, psword, registration_date, user_ip)
VALUES (' ', '$fn', '$ln', '$e', SHA1('$p'), NOW(), '$user_ip')";
 $result = @mysqli_query ($dbcon, $q); // Run the query.

 $sel_cart = "SELECT * FROM cart WHERE ip_add='$user_ip'";
 $run_cart = @mysqli_query ($dbcon, $sel_cart);
 $check_cart = mysqli_num_rows($run_cart);

 if ($result) { // If it runs
  echo "<script>alert('Registration successful')</script>";

  if ($check_cart>0) {
    // if user has items in cart
    echo "<script>window.open('checkout.php','_self')</script>";
  } else {
    // if user has no item in cart
    echo "<script>window.open('../index.php','_self')</script>";
  }

 exit();
 } else { // If it did not run
 // Message:
 echo '<h2>System Error</h2>
<p class="error">You could not be registered due to a system error. We apologize
for any inconvenience.</p>';
 // Debugging message:
 echo "Error: " . $sql . "<br>" . $dbcon->error;
 } // End of if ($result)
 mysqli_close($dbcon); // Close the database connection.
 // Include the footer and quit the script:
 include ('includes/user-footer.php');
 exit();
 } else { // Report the errors.
 echo '<h2>Error!</h2>
 <p class="error">The following error(s) occurred:<br>';
 foreach ($errors as $msg) { // Extract the errors from the array and echo them
 echo " - $msg<br>\n";
 }
 echo '</p><h3>Please try again.</h3><p><br></p>';
 }// End of if (empty($errors))
} // End of the main Submit conditional.
?>
