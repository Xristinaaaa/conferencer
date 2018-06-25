<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Регистрация</title>
    </head>
    <body>
        <?php if(isset($_GET['exists']) && $_GET['exists']):?>
            Този имейл вече е зает
        <?php endif?>
        <form action="../controllers/register.php" method="POST">
            <div class="input_container c1" id="name">
                <input name="name" type="text" placeholder="Име" required />
            </div>
            <div class="input_container c1">
                <input name="email" type="email" placeholder="Електронна поща" required />
            </div>
            <div class="input_container">
                <input name="password" type="password" placeholder="Парола" required />
            </div>
            <span>Готов си за регистрация</span>
            <div>
                <input type="reset" value="Изчисти" />
                <input type="submit" value="Регистрация" />
            </div>
        </form>
    </body>
</html>