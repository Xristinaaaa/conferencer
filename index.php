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
  <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">
            <i class="fa fa-mortar-board"></i>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#feature">Features</a></li>
          <li><a href="#workshops">Workshops</a></li>
          <li><a href="#conferences">Conferences</a></li>
          <li><a href="">Trainings</a></li>
          <li><a href="">Interns</a></li>
          <li><a href="#contact">Contact</a></li>
          <li class="btn-trial"><a href="#" data-target="#login" data-toggle="modal">Sign in</a></li>
          <li class="btn-trial"><a href="#" data-target="#register" data-toggle="modal">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
  <?php
      include "app/views/login.php";
      include "app/views/register.php";
      include "app/views/banner.php";
      include "app/views/features.php";
      include "app/views/workshop.php";
      include "app/views/testimonial.php";
      include "app/views/conferences.php";
      include "app/views/contact.php";
      include "app/views/footer.php";
    ?>
  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/jquery.easing.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/custom.js"></script>
</body>
</html>
