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

            $mysql = new mysqli('localhost', 'root', 'root', 'HomeControl');
            $email = $userInfo['email'];
            $result_user = $mysql->query("SELECT `user_id` FROM `users` WHERE `email` = '$email'");
            $user_arr_data = $result_user->fetch_assoc();
            $secret_name = md5($userInfo['given_name'] . "ghjfdkhgj453534$#@#");
            if (!(count($user_arr_data) > 0)) {

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

                $mysql = new mysqli('localhost', 'root', 'root', 'HomeControl');

                $mysql->query("INSERT INTO `users` (`role_id`,`fullname`,`name`,`email`, `login`, `password`, `registration_date`, `is_active`)
            VALUES ('$role', '$fullname', '$name', '$email', '$login', '$password', '$register_date', '$status')");
                $mysql->close();

                setcookie('user', $secret_name, time() + 3600, "/");

                header('Location: ../marketplace.php');
            } else {
                setcookie('user', $secret_name, time() + 3600, "/");
                header('Location: ../marketplace.php');
            }
            if (isset($userInfo['id'])) {

                $userInfo = $userInfo;

                $result = true;
            }
        }
    }
