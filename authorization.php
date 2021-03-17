<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    $password = md5($password."ghjfdkhgj453534");

    $mysql = new mysqli('localhost', 'root', 'root', 'HomeControl');
    

    $result = $mysql->query("SELECT `user_id` FROM Users WHERE login = $login AND password = $password;");
    
    $user = $result->fetch_assoc();

    print_r($user);

    $mysql->close();

    header('Location: /');


?>