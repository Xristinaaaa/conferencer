<?php

require_once "../libs/Init.php";
Init::_init();

use models\User;

$user = new User("");
if (isset($_SESSION['id']) && $_SESSION['id'])
{
    $user->setId($_SESSION['id']);
    $user->load();

} else {
    header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="../../public/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
</head>
<body class="page-container">
  <?php
    include "navbar.php";
  ?>
  <div id="profile" class="container section-padding">
    <div class="row ">
        <h1><?= $user->getName()?>'s profile</h1>
    </div>
    <div class="row">
        <div class="col-sm-8 profile-form-wrapper">
            <div class="form-box">
                <div class="form-top">
                    <?php if($user->getAvatar())  { ?>
                        <img width="210px" height="230px" src="<?= $user->getAvatar()?>" id="profile-avatar">
                    <?php } else { ?>
                        <img src="../../public/uploads/avatar.jpg" id="profile-avatar">
                    <?php } ?>
                </div>
                <button class="btn btn-trial btn-green"><a href="#" data-target="#profileAvatar" data-toggle="modal">Change your avatar</a></button>
                <form class="profile-form" role="form" action="profile.php" method="post" id="user-profile-form">
                    <div class="form-group">
                        <label for="form-email">Email</label>
                        <input class="form-email form-control" type="text" name="profileEmail" value="<?= $user->getEmail()?>" id="form-email">
                        <span class="error error-email"></span>
                    </div>
                    <div class="form-group">
                        <label for="form-first-name">Username</label>
                        <input class="form-first-name form-control" type="text" name="profileName" value="<?= $user->getName()?>" id="form-first-name">
                        <span class="error error-firstname"></span>
                    </div>
                    <input type="submit" class="btn btn-green btn-block" value="Save" name="submit"/>
                </form>
            </div>
        </div>
    </div>
  </div>
  <?php
    if (isset($_POST["profileName"]) && isset($_POST["profileEmail"])) {
        $GLOBALS['user']->updateInfo($GLOBALS['user']->getId(), $_POST["profileName"], $_POST["profileEmail"]);
        $GLOBALS['user']->load();
        header("Refresh:0");
    }
  ?>
  <?php 
    include "profileAvatar.php";
  ?>
  <script src="../../public/js/jquery.min.js"></script>
  <script src="../../public/js/jquery.easing.min.js"></script>
  <script src="../../public/js/bootstrap.min.js"></script>
  <script src="../../public/js/custom.js"></script>
  <script src="../../public/js/main.js"></script>
</body>
</html>
