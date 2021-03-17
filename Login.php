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
                <a class="logo_link" href="index.html">
                    <div class="logo-block">
                        <img src="photo/MainLogo.png" alt="">
                    </div>
                    <h5>Home Control</h5>
                </a>
            </div>
            <nav class="nav">
                <a class="nav_link" href="index.html">Home</a>
                <a class="nav_link" href="index.html#services">Services</a>
                <a class="nav_link" href="index.html#us">About Us</a>
                <a class="nav_link" href="Contacts.html">Contacts</a>
                <a class="nav_link" href="#">Marketplace</a>
                <a class="nav_link" href="Login.php">Login</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="form form_login" id="loginForm">
            <?php
                if($_COOKIE['user'] == ''):
                ?>
            <div class="form_head">
                <div class="wrapper_image">
                    <div class="form_block_image">
                        <img src="photo/UserAvatar.png" alt="">
                    </div>
                </div>
                <p>Authorization</p>
            </div>
            <div class="form_content">
                <form id="forma" action="authorization.php" method="POST">
                    
                    <div class="input_block">
                        <div class="f-group">
                            <input id="login" type="text" placeholder="Login" name="login" />
                            <label for="login">Login</label>
                        </div>

                        <div class="f-group">
                            <input id="password" type="password" placeholder="Password" name="password" />
                            <label for="password">Password</label>
                            <i class="fa fa-eye-slash hide_pass" id="hidePass"></i>
                        </div>
                    </div>
                    <div class="button_block">
                        <button class="button" type="submit" name="" value="Submit">Login</button>
                        <button class="button" id="loginRegisterBtn" type="button" name="" value="Submit">Registration</button>
                    </div>
                </form>
            </div>
            <?php else:?>
            <p>Привет <?=$_COOKIE['']?>. Чтобы выйти нажмите<a href="/exit.php">здесь</a></p>
            <?php endif;?>
        </div>

        <div class="form form_registration" id="registerForm">
            <div class="form_head">
                <i class="fa fa-arrow-left backToLogin" id="backToLoginForm"></i>
                <div class="wrapper_image">
                    <div class="form_block_image">
                        <img src="photo/UserAvatar.png" alt="">
                    </div>
                </div>
                <p>Registration</p>
            </div>
            <div class="form_content">
                <form id="forma" action="registration.php" method="POST">
                    <div class="input_block input_block_register">
                        <div class="left_block">
                            <div class="f-group">
                                <input id="name" type="text" placeholder="Name" name="name" />
                                <label for="name">Name</label>
                            </div>
                            <div class="f-group">
                                <input id="fullname" type="text" placeholder="Fullname" name="fullname" />
                                <label for="fullname">Fullname</label>
                            </div>
                            <div class="f-group">
                                <input id="patronymic" type="text" placeholder="Patronymic" name="patronymic" />
                                <label for="patronymic">Patronymic</label>
                            </div>
                            <div class="f-group">
                                <input id="number" type="text" placeholder="Number" name="number" />
                                <label for="number">Number</label>
                            </div>
                            <div class="f-group">
                                <input id="address" type="text" placeholder="Address" name="address" />
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="right_block">
                            <div class="f-group">
                                <input id="email" type="email" placeholder="Email" name="email" />
                                <label for="email">Email</label>
                            </div>
                            <div class="f-group">
                                <input id="birthday" type="date" placeholder="Date of birth" name="birth" />
                                <label for="birthday">Date of birth</label>
                            </div>
                            <div class="f-group">
                                <input id="login" type="text" placeholder="Login" name="login" />
                                <label for="login">Login</label>
                            </div>

                            <div class="f-group">
                                <input id="regPassword" type="password" placeholder="Password" name="password" />
                                <label for="regPassword">Password</label>
                                <i class="fa fa-eye-slash hide_pass" id="hidePassReg"></i>
                            </div>
                            <div class="f-group">
                                <input id="repeatPassword" type="password" placeholder="Repeat password" />
                                <label for="repeatPassword">Repeat password</label>
                            </div>
                        </div>
                    </div>
                    <div class="button_block">
                        <button class="button register_btn" type="submit" name="" value="Submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
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