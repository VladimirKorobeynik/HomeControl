<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    $password = md5($password."ghjfdkhgj453534$#@#");

    $secret_name = md5($user['name']."ghjfdkhgj453534$#@#");

    $mysql = new mysqli('localhost', 'root', 'root', 'HomeControl');
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    
    $user = $result->fetch_assoc();
    
    if(count($user) > 0){
        setcookie('user', $secret_name, time() + 3600, "/");
        header('Location: ../profile.php');
    }
    else{
        header('Location: ../Login.php');
    }
    $mysql->close();
