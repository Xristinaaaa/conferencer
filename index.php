<?php

require_once "app/libs/Init.php";
Init::_init();

use models\User;

$user = new User("");
if (isset($_SESSION['id']) && $_SESSION['id'])
{
    $user->setId($_SESSION['id']);
    $user->load();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="public/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="public/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
  <?php
    include "app/views/navbar.php";
    include "app/views/login.php";
    include "app/views/register.php";
    include "app/views/banner.php";
    include "app/views/features.php";
    include "app/views/workshop.php";
    include "app/views/testimonial.php";
    include "app/views/contact.php";
    include "app/views/footer.php";
  ?>
  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/jquery.easing.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/custom.js"></script>
  <script src="public/js/main.js"></script>
</body>
</html>
