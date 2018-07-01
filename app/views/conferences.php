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

use models\Event;
use models\Category;
use models\Country;
use models\City;

$countries = Country::fetchAll();
$cities = City::fetchAll();
$categories = Category::fetchAll();
$conferences = Event::fetchAllConferences();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <link rel="stylesheet" type="text/css" href="../../public/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
</head>
<body class="page-container">
  <?php
    include "navbar.php";
  ?>
  <section id="conferences" class="container section-padding text-center">
      <div class="row">
        <div class="header-section text-center">
          <h2>Conferences</h2>
          <p>Find interesting events you can join</p>
          <hr class="bottom-line">
        </div>
      </div>
      <div class="row form-group">
        <div class="button-group" id="search">
          <form class="form-inline" action="/conferencer/app/views/conferences.php" method="GET">
            <select class="form-control" name="countryDropdown">
              <option selected="" disabled="">Country</option>
              <?php foreach($countries as &$country) { ?>     
                <option value=<?= $country->getName() ?>><?= $country->getName() ?></option>
              <?php } ?>
            </select>
            <select class="form-control" name="cityDropdown">
              <option selected="" disabled="">City</option>
              <?php foreach($cities as &$city) { ?>     
                <option value=<?= $city->getName() ?>><?= $city->getName() ?></option>
              <?php } ?>
            </select>
            <input class="form-control" type="text" placeholder="Name" name="confName">
            <input class="form-control datepicker" type="text" placeholder="Date of event" name="confDateOfEvent">
            <button class="button btn btn-green">Search</button>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="button-group" id="filters">
          <button class="button btn btn-green" data-filter="*">Show all</button>
          <?php foreach($categories as &$category) { ?>      
            <button class="button btn btn-default" data-filter="<?= $category->getId() ?>"><?= $category->getName() ?></button>
          <?php } ?>
        </div>
      </div>
      <div class="row">
          <hr class="bottom-line">
          <button class="btn btn-trial btn-green"><a href="#" data-target="#createConference" data-toggle="modal">Create New Conference</a></button>
      </div>
      <div class="row grid">
      <?php 
      foreach($conferences as $conference) { ?>
        <div class="col-md-4 col-sm-6 <?= $conference->getCategoryId() ?>">      
          <div class="service-box">
              <img src="<?= $conference->getCoverUrl() ?>" width='100%' height='130px' alt="">
              <div class="card-body">
                <h4 class="card-title">
                    <a href="#"><?= $conference->getName() ?></a>
                </h4>
                <p class="card-text"><?= $conference->getDescription() ?></p>
              </div>
          </div>
        </div>
      <?php } ?>
      </div>
  </section>
  <?php
    include "createConference.php";
  ?>
  <script src="../../public/js/jquery.min.js"></script>
  <script src="../../public/js/jquery.easing.min.js"></script>
  <script src="../../public/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <script src="../../public/js/isotope.pkgd.min.js"></script>
  <script src="../../public/js/custom.js"></script>
  <script src="../../public/js/main.js"></script>
  <script src="../../public/js/conferences.js"></script>
</body>
</html>
