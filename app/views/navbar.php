<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
        <a class="navbar-brand" href="/conferencer/index.php" id="logo">
            <i class="fa fa-mortar-board"></i>
        </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/conferencer/index.php#feature">Features</a></li>
            <li><a href="/conferencer/index.php#workshops">Workshops</a></li>
            <li><a href="/conferencer/index.php#conferences">Conferences</a></li>
            <li><a href="">Trainings</a></li>
            <li><a href="">Interns</a></li>
            <li><a href="/conferencer/index.php#contact">Contact</a></li>
            <?php if ($user->getId()):?>
            <li class="btn-trial"><a href="/conferencer/app/views/profile.php">Hello <?= $user->getName()?> </a></li>
            <li class="btn-trial"><a href="/conferencer/app/views/logout.php">Logout</a></li>
            <?php else: ?>
            <li class="btn-trial"><a href="/conferencer/index.php#login" data-target="#login" data-toggle="modal">Sign in</a></li>
            <li class="btn-trial"><a href="/conferencer/index.php#register" data-target="#register" data-toggle="modal">Register</a></li>
            <?php endif?>
        </ul>
        </div>
    </div>
</nav>