<?php
include '../web/Database.php';

$DB = new Database();

$userObject = json_decode(file_get_contents("php://input"), true);

$fullname = $userObject["fullname"];
$name = $userObject["name"];
$patronymic = $userObject["patronymic"];
$number = $userObject["number"];
$address = $userObject["address"];
$email = $userObject["email"];
$birthday = $userObject["birthday"];
$registrationDate = $userObject["registrationDate"];
$login = $userObject["login"];
$password = $userObject["password"];

$password = md5($userObject["password"]."ghjfdkhgj453534$#@#");

$result = $DB->sendQuery("SELECT `user_id` FROM `users` WHERE `login` = '$login' OR `email` = '$email'")->fetch_assoc();

if (count($result) == 0) {

    $birthday = implode('-', array_reverse(explode('.', $birthday)));

    $result = $DB->sendQueryWithID("INSERT INTO `users` (`role_id`, `subscription_id`, `fullname`, `name`,
    `patronymic`, `number`, `address`, `email`, `birthday`, `login`, `registration_date`, `password`,
     `is_active`, `is_active_subscription`) VALUES(1, 4, '$fullname', '$name', '$patronymic', '$number', '$address', 
     '$email', '$birthday', '$login', '$registrationDate', '$password', true, false);");
   
   $result = $result->fetch_assoc()["LAST_INSERT_ID()"];
   
   $userRecord = $DB->sendQuery("SELECT `user_id`, `role_id`, `subscription_id`, `fullname`, `name`,
   `patronymic`, `number`, `address`, `email`, `birthday`, `login`, `registration_date`,
    `is_active`, `is_active_subscription` FROM `users` WHERE `user_id` = $result;");
   
   $user = json_encode($userRecord->fetch_assoc(), JSON_UNESCAPED_UNICODE);
   
   echo $user;
}
?>