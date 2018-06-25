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

// var_dump(User::fetchAll());

// $user = new User('test2', '1111');
// $user->insert();

// var_dump($user->getId());

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Начало</title>
    </head>
    <body>
        <?php if ($user->getId()):?>
            Здравей, <?= $user->getName()?>
            <a class="button" id="logout" href="app/views/logout.php">Излез</a>
        <?php else: ?>
            <a class="button" id="register" href="app/views/register.php">Регистрирай се</a>
            <a class="button" href="app/views/login.php">Влез</a>
        <?php endif?>
    </body>
</html>
