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
    <?php


    //Заполенные данные с google'a
    $client_id = '123373435506-4a1sroj5ldous58al35rtieutpv56p1h.apps.googleusercontent.com'; // Client ID

    $client_secret = '50G_MlDGUf_RXBck52_aBOGp'; // Client secret

    $redirect_uri = 'http://localhost/Login.php'; // Redirect URIs



    $url = 'https://accounts.google.com/o/oauth2/auth';


    //создание массива с данными
    $params = array(

        'redirect_uri'  => $redirect_uri,

        'response_type' => 'code',

        'client_id'     => $client_id,

        'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'

    );



    //Получение токена и проверка на его наличие
    if (isset($_GET['code'])) {

        $result = false;



        $params = array(

            'client_id'     => $client_id,

            'client_secret' => $client_secret,

            'redirect_uri'  => $redirect_uri,

            'grant_type'    => 'authorization_code',

            'code'          => $_GET['code']

        );



        $url = 'https://accounts.google.com/o/oauth2/token';


        //КУрлы
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_POST, 1);

        curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($curl);

        curl_close($curl);

        $tokenInfo = json_decode($result, true);



        if (isset($tokenInfo['access_token'])) {

            $params['access_token'] = $tokenInfo['access_token'];



            $userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);

            $mysql = new mysqli('localhost', 'root', 'root', 'homecontrol');
            $email = $userInfo['email'];
            if (!(count($mysql->query("SELECT `user_id` FROM `users` WHERE `email` = '$email'")) > 0)) {

                $chars = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";

                $max = 10;

                $size = StrLen($chars) - 1;

                $Generate_login = null;

                $Generate_password = null;

                while ($max--) {
                    $Generate_login .= $chars[rand(0, $size)];
                    $Generate_password .= $chars[rand(0, $size)];
                }

                $name = $userInfo['given_name'];
                $fullname = $userInfo['family_name'];
                $login = $Generate_login;
                $password = $Generate_password;
                $register_date = date("Y-m-d");

                $status = true;
                $role = 2;
                $password = md5($password . "ghjfdkhgj453534$#@#");

                $mysql = new mysqli('localhost', 'root', 'root', 'homecontrol');

                $mysql->query("INSERT INTO `users` (`role_id`,`fullname`,`name`,`email`, `login`, `password`, `registration_date`, `is_active`)
            VALUES ('$role', '$fullname', '$name', '$email', '$login', '$password', '$register_date', '$status')");
            } else {
                setcookie('user', $userInfo['given_name'], time() + 3600, "/");
                header('Location: /Login.php');
            }
            if (isset($userInfo['id'])) {

                $userInfo = $userInfo;

                $result = true;
            }
        }
    }



    ?>
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
                <?php
                if ($_COOKIE['user'] == '') :
                ?>
                    <a class="nav_link" href="Login.php">Login</a>
                <?php else : ?>
                    <?= $_COOKIE[''] ?><a href="/exit.php" class="exit_link">Log out</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main>
        <div class="form form_login" id="loginForm">
            <?php
            if ($_COOKIE['user'] == '') :
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
                            <?php echo $link = '<a class="button" style="display:block;" href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через Google</a>'; ?>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
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