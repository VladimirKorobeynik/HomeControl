<?php

    require_once "Database.php";

    session_start();
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $fullname = filter_var(trim($_POST['fullname']), FILTER_SANITIZE_STRING);
    $patronymic = filter_var(trim($_POST['patronymic']), FILTER_SANITIZE_STRING);
    $number = filter_var(trim($_POST['number']), FILTER_SANITIZE_STRING);
    $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $birth = filter_var(trim($_POST['birth']), FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $register_date = date("Y-m-d");

    if (mb_strlen($name) < 3) {
        header('Location: ../Login.php?error=Name must be at least 3 characters long');
        return;
    }

    if (mb_strlen($login) < 1) {
        header('Location: ../Login.php?error=Login must be not null');
        return;
    }

    if (!$birth) {
        header('Location: ../Login.php?error=birthday is required');
        return;
    }

    $status = true;
    $role = 2;
    $password = md5($password."ghjfdkhgj453534$#@#");

    $mysql = Database::getConnection();
    if (Database::sendQuery("SELECT * FROM `users` WHERE login='$login'")->fetch_array() != null) {
        header('Location: ../Login.php?error=Login already exists!');
        return;
    }

    $query = $mysql->query("INSERT INTO `users` (`role_id`,`fullname`,`name`,`patronymic`,`number`,`address`,`email`,`birthday`, `login`, `password`, `registration_date`, `is_active`)
    VALUES ($role, '$fullname', '$name', '$patronymic', '$number', '$address', '$email', '$birth', '$login', '$password', '$register_date', '$status')"); 
    if (!$query) {
        header("Location: ../Login.php?error=Internal error in database. " . $mysql->error);
        return;
    }

    $_SESSION["id"] = $mysql->insert_id;

    header('Location: ../profile.php');
