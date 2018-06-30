<?php

require_once "../libs/Init.php";
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
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="../../public/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
</head>
<body>
  <?php
    include "navbar.php";
  ?>
  <div id="profile" class="container col-centered">
    <div class="row">
        <h1><?= $user->getName()?>'s profile</h1>
    </div>
    <div class="row">
        <div class="col-sm-8 profile-form-wrapper">
            <div class="form-box">
                <div class="form-top">
                    <img src="../../public/uploads/avatar.jpg" id="profile-avatar">
                    <div class="btn-wrap">
                        <a class="btn btn-green" href="/profile/avatar">Change your avatar</a>
                    </div>
                </div>
            <div class="form-bottom">
            <div class="alert alert-danger" id="error-container">
                <strong>The following errors need to be corrected:</strong>
                <ul></ul>
            </div>
            <form class="profile-form" role="form" action="" method="post" id="user-profile-form">
                <div class="form-group">
                    <label for="form-email">Email</label>
                    <input class="form-email form-control" type="text" name="email" value="<?= $user->getEmail()?>" id="form-email">
                    <span class="error error-email"></span>
                </div>
                <div class="form-group">
                    <label for="form-first-name">Username</label>
                    <input class="form-first-name form-control" type="text" name="userName" value="<?= $user->getName()?>" id="form-first-name">
                    <span class="error error-firstname"></span>
                </div>
                <input type="submit" class="btn btn-green btn-block" value="Save" />
            </form>
        </div>
    </div>
  </div>
  <script src="../../public/js/jquery.min.js"></script>
  <script src="../../public/js/jquery.easing.min.js"></script>
  <script src="../../public/js/bootstrap.min.js"></script>
  <script src="../../public/js/custom.js"></script>
  <script src="../../public/js/main.js"></script>
</body>
</html>
