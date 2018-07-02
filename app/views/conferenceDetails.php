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
$event = new Event("");
$event->setId($_GET['id']);
$event->load();
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
<body class="details-container">
    <?php
    include "navbar.php";
  ?>
<div class="container section-padding">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 title">
                    <h1><?= $event->getName() ?></h1>
                </div>
                <div class="event-info" id="5845cdd4889aa00011f25244">
                    <div class="event-cover col-sm-6">
                        <img src="<?= $event->getCoverUrl() ?>" width="100%" height="200px">
                    </div>
                    <div class="event-details-info col-sm-6">
                        <div class="event-date">
                            <div>
                                <label>Start Date:</label>
                                <p><?= $event->getStartDate() ?></p>
                            </div>
                            <div>
                                <label>End Date:</label>
                                <p><?= $event->getEndDate() ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="location col-sm-6">
                        <label>Location:</label>
                        <div class="city"> - City: <?= $event->getCity() ?></div>
                        <div class="address"> - Address: <?= $event->getLocation() ?></div>
                        <div class="capacity">
                            <label></label>
                            <label>Capacity:</label>
                            <p> <?= $event->getCapacity() ?></p>
                        </div>
                    </div>
                </div>
                <div class="additional col-sm-12">
                    <div class="event-desc">
                        <h3>Description:</h3>
                        <p><?= $event->getDescription() ?></p>
                    </div>
                    <h3>Comments</h3>
                    <div class="comments-list">
                        <div id="comments"></div>
                        <div class="make-comment">
                            <textarea class="form-comment form-control" type="text" name="comment" placeholder="Comment.." 
                            id="comment-textarea">
                            </textarea>
                            <span class="error"></span>
                            <button class="btn btn-green" type="button" id="comment-button">Add Comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
<script src="../../public/js/jquery.min.js"></script>
  <script src="../../public/js/jquery.easing.min.js"></script>
  <script src="../../public/js/bootstrap.min.js"></script>
  <script src="../../public/js/main.js"></script>
</body>
</html>
