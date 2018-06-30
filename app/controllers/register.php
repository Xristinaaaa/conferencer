<?php

require_once "../libs/Init.php";
Init::_init(true);

use models\User;

$user = new User($_POST['name'], $_POST['password']);
$user->setEmail($_POST['email']);

$success = $user->insert();

if ($success)
{
    header('Location: ../../index.php');
}
else
{
    header('Location: ../../index.php?exists=true#register');   
}
