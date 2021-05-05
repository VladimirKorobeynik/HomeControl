<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/Login.css">
    <link rel="stylesheet" href="styles/marketplace.css">
    <link rel="shortcut icon" href="photo/MainLogo.png" type="image/x-icon">
    <title>Home Control</title>
</head>

<body>
    <?php include 'web/google_authorization.php' ?>

    <div class="preloader" id="preloader">
        <div class="loader">
            <img src="photo/house.png" alt="">
            <img src="photo/loaderGear.png" class="bigGear" alt="">
            <img src="photo/loaderGear.png" class="smallGear" alt="">
        </div>
    </div>

    <div class="wrapper">

        <?php include 'parts/marketplaceHeader.php' ?>

        <main>
            <div class="form_content_wrap">
                <?php
                if ($_COOKIE['user'] == '') :
                ?>
                    <div class="form form_login" id="loginForm">
                        <div class="form_head">
                            <div class="wrapper_image">
                                <div class="form_block_image">
                                    <img src="photo/UserAvatar.png" alt="">
                                </div>
                            </div>
                            <p>Authorization</p>
                        </div>
                        <div class="form_content">
                            <form id="formaLog" action="web/authorization.php" method="POST">

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
                                    <?php echo $link = '<a class="button" style="background-color:white;border:1px solid black; text-decoration:none; color:black; font-weight:300;display:flex;padding:15px 35px;" href="' . $url . '?' . urldecode(http_build_query($params)) . '"><img src="photo/google_icon.png" style="max-width:30px;max-height:auto;margin-right:10px;"/><p style="line-height:30px; font-size:14px">Аутентификация через Google</p></a>'; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
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
                        <form id="formaReg" action="web/registration.php" method="POST">
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
                                        <input id="loginReg" type="text" placeholder="Login" name="login" />
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
            </div>
        </main>

        <?php include 'parts/footer.php' ?>

    </div>
</body>
<script src="js/authorization.js"></script>
<script src="js/loader.js"></script>
<script src="js/burgerNavigation.js"></script>
<script src="https://kit.fontawesome.com/e3dce40605.js" crossorigin="anonymous"></script>

</html>