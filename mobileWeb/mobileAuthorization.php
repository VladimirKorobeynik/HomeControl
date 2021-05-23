<?php
include '../web/Database.php';

$DB = new Database();

$input = json_decode(file_get_contents("php://input"), true);

$login = $input["login"];
$password = md5($input["password"]."ghjfdkhgj453534$#@#");

$result = $DB->sendQuery("SELECT `user_id`, `role_id`, `subscription_id`, `fullname`, `name`,
 `patronymic`, `number`, `address`, `email`, `birthday`, `login`, `registration_date`,
  `is_active`, `is_active_subscription` FROM `users` WHERE `login` = '$login' AND `password` = '$password';");

$user = json_encode($result->fetch_assoc(), JSON_UNESCAPED_UNICODE);

echo $user;

?>
