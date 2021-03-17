<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    $password = md5($password."ghjfdkhgj453534");

    $mysql = new mysqli('localhost', 'root', 'root', 'homecontrol');
    

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    
    $user = $result->fetch_assoc();

    setcookie('user', $user['name'], time() + 3600, "/");
    $mysql->close();

    header('Location: /Login.php');
?>