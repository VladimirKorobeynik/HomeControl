<?php
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

    $status = true;
    $role = 2;
    $password = md5($password."ghjfdkhgj453534");

    $mysql = new mysqli('localhost', 'root', 'root', 'homecontrol');

    $mysql->query("INSERT INTO `users` (`role_id`,`fullname`,`name`,`patronymic`,`number`,`address`,`email`,`birthday`, `login`, `password`, `registration_date`, `status`)
    VALUES ('$role', '$fullname', '$name', '$patronymic', '$number', '$address', '$email', '$birth', '$login', '$password', '$register_date', '$status')");

?>