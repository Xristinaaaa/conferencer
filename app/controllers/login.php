<?php

require_once "../libs/Init.php";
Init::_init(true);

use models\User;

$user = new User('', $_POST['password']);
$user->setEmail($_POST['email']);

$exists = $user->load();
if ($exists)
{
    $_SESSION['id'] = $user->getId();
    header('Location: ../../index.php');
}
else
{
    header('Location: ../../index.php?exists=true#login');
}


