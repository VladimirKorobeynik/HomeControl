<?php
    session_start();
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $password = md5($password."ghjfdkhgj453534$#@#");

    require_once "Database.php";

    $mysql = Database::getConnection();
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

    $user = $result->fetch_assoc();
    if($user != null && count($user) > 0){
        if ($user['role_id'] == 1) {
            $_SESSION["id"] = $user["user_id"];
            $_SESSION["is_admin"] = true;

            header('Location: ../admin.php');
        } else {
            $_SESSION["id"] = $user["user_id"];;
            header('Location: ../marketplace.php');
        }
    }
    else{
        header('Location: ../Login.php?error=Unknown user');
    }
    $mysql->close();
