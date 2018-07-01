<?php

require_once "../libs/Init.php";
Init::_init(true);

use models\Event;
use models\Category;

$conference = new Event($_POST['confName']);
$conference->setStartDate($_POST['startDateOfConf']);
$conference->setEndDate($_POST['endDateOfConf']);
$conference->setLocation($_POST['confLocation']);
$conference->setCoverUrl($_POST['confCoverUrl']);
$conference->setDescription($_POST['confDescription']);
$conference->setLecturer($_POST['confLecturer']);
$conference->setPrice($_POST['confPrice']);
$conference->setCapacity($_POST['confCapacity']);
$conference->setEventTypeId(2);

$category=new Category($_POST['category']);
$category->getByName();

$conference->setCategoryId($category->getId());

if(!empty($_POST['city'])) {
    $conference->setCity($_POST['city']);  
}

$success = $conference->insert();
if ($success)
{
    header('Location: ../views/conferences.php');
}
else
{
    header('Location: ../../index.php');
}


