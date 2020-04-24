<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<title><?php echo $_SESSION['errtitle'] ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/includes/errorPage/errorPage.css">
<body>

<!-- Navbar (sit on top) -->

<!-- First Parallax Image with Logo Text -->
<?php include_once 'header.php'; ?>
<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-32" id="about">
    <h3 class="w3-center"><?php echo $_SESSION['errbody'] ?></h3>
    <p></p>
</div>

<div class="w3-content w3-container w3-padding-8" id="apply">
</div>
<div style="text-align: center;">
    <a href="../../index.php" class="w3-button w3-grey w3-round w3-large" id="student">Back To Home Page</a>
    <br><br>
</div>
<!-- Footer -->
<!--<footer class="w3-center w3-black w3-padding-64 w3-opacity ">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
</footer>-->
<?php include_once 'footer.php'; ?>
</body>
</html>
<?php
http_response_code($_SESSION['errcode']);
?>