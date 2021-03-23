<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="contacts.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="fontawesome.css">
    <link rel="shortcut icon" href="photo/MainLogo.png" type="image/x-icon">
    <title>Home Control</title>
</head>

<body>
    <div class="preloader" id="preloader">
        <div class="loader">
            <img src="photo/house.png" alt="">
            <img src="photo/loaderGear.png" class="bigGear" alt="">
            <img src="photo/loaderGear.png" class="smallGear" alt="">
        </div>
    </div>

    <header class="header">
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
                <a class="nav_link" href="index.php#services">Services</a>
                <a class="nav_link" href="index.php#us">About Us</a>
                <a class="nav_link" href="Contacts.php">Contacts</a>
                <a class="nav_link" href="#">Marketplace</a>
                <?php
                if ($_COOKIE['user'] == '') :
                ?>
                    <a class="nav_link" href="Login.php">Login</a>
                <?php else : ?>
                    <?= $_COOKIE[''] ?><a href="/exit.php" class="exit_link"></a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main>

    </main>

    <footer class="footer">
        <div class="container">
            <div class="information-block">
                <div class="social">
                    <a href="#" class="soc">Instagram</a>
                    <a href="#" class="soc">Telegram</a>
                    <a href="#" class="soc">Youtube</a>
                    <a href="#" class="soc">VK</a>
                </div>
                <p>2021 &copy; Home Control</p>
            </div>
        </div>
    </footer>
</body>
<script src="authorization.js"></script>
<script src="loader.js"></script>
<script src="https://kit.fontawesome.com/e3dce40605.js" crossorigin="anonymous"></script>

</html>