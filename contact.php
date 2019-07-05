<?php

session_start();
include("includes/db.php");
include("functions/functions.php");

 ?>
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

     <!-- Page Content -->
     <div class="container mt-3">
       <div class="row">
         <div class="col-12">
           <ul class="breadcrumb bg-white pl-5 pr-5" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, .1); border-radius:0;">
             <li class="pr-3">
               <a href="index.php">Home</a>
             </li>
             <li class="pr-3">
               <i class="fa fa-chevron-right text-muted pr-2" style="font-size:10px"></i> Contact Us
             </li>
           </ul>
         </div>
         <div class="col-sm-4 col-md-3 mb-5">
          <?php include('includes/sidebar.php'); ?>
         </div>
         <div class="col-sm-8 col-md-9 contact-box">
           <div class="card">
             <div class="container-fluid pt-3 pb-3">
               <div class="col-12 text-center">
                 <h2>Feel free to contact us</h2>
                 <p class="text-muted">
                   if you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
                 </p>
               </div>
               <form class="" action="contact.php" method="post">
                 <div class="form-group">
                   <label>Name</label>
                   <input type="text" name="name" class="form-control" required>
                 </div>
                 <div class="form-group">
                   <label>Email</label>
                   <input type="text" name="email" class="form-control" required>
                 </div>
                 <div class="form-group">
                   <label>Subject</label>
                   <input type="text" name="subject" class="form-control" required>
                 </div>
                 <div class="form-group">
                   <label>Message</label>
                   <textarea name="message" class="form-control"></textarea>
                 </div>
                 <div class="text-center">
                   <button type="submit" name="submit" class="btn btn-primary">
                     <i class="fa fa-user-md">Send Message</i>
                   </button>
                 </div>
               </form>
             </div>
           </div>
         </div>
         <?php

          if (isset($_POST['submit'])) {
            // code...
            $sender_name = $_POST['name'];
            $sender_email = $_POST['email'];
            $sender_subject = $_POST['subject'];
            $sender_message = $_POST['message'];

            $receiver_email = "george.isiguzo@yahoo.com";

            @mail($receiver_email,$sender_name,$sender_message,$sender_subject,$sender_email);
            //Auto reply to sender
            $email = $_POST['email'];
            $subject = "Welcome to my website";
            $msg = "Thank you for contacting us. We will be in touch with you very soon";

            $from = "george.isiguzo@yahoo.com";

            @mail($email,$subject,$msg,$from);

            echo "<script> alert('Your message was sent successfully.') </script>";
          }

          ?>
       </div>
     </div>


     <?php include('includes/footer.php'); ?>

  </body>
</html>
