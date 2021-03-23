<header class="header" id="header">
    <div class="header_inner">
        <div class="header_logo">
            <a class="logo_link" href="index.php">
                <div class="logo-block">
                    <img src="photo/MainLogo.png" alt="">
                </div>
                <h5>Home Control</h5>
            </a>
        </div>
        <nav class="nav">
            <a class="nav_link" href="index.php">Home</a>
            <a class="nav_link" id="serv" href="index.php#services">Services</a>
            <a class="nav_link" id="about" href="index.php#us">About Us</a>
            <a class="nav_link" href="Contacts.php">Contacts</a>
            <a class="nav_link" href="#">Marketplace</a>
            <?php
            if ($_COOKIE['user'] == '') :
            ?>
                <a class="nav_link" href="../Login.php">Login</a>
            <?php else : ?>
                <?= $_COOKIE[''] ?><a href="../web/exit.php" class="exit_link">Log out</a>
            <?php endif; ?>
        </nav>
    </div>
</header>