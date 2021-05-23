<?
$products = json_decode($_GET["products"], true);

require_once "../web/Database.php";
require_once "../web/mail.php";

session_start();
$database = Database::getConnection();
$user = $database->query("SELECT * FROM `users` WHERE user_id='${_SESSION["id"]}'")->fetch_array();
$email = $user["email"];
foreach ($products as $product) {
	$key = md5(time() . $product["device_id"] . $_SESSION["id"] . $_SESSION["name"]);
	$database->query("INSERT INTO `users_devices`(`user_id`, `device_id`, `name`,  `activation_key`, `is_activated`, `activate_date`) VALUES (${_SESSION["id"]}, ${product["device_id"]}, '${product["name"]}', '$key', false, 0)");
	sendMail("mail.adm.tools", "test@sandstone.kh.ua", "65!3j+!LBiUh", $email, "New order", "Вы оплатили заказ ${product["name"]}. Код активации: $key. Активируйте в приложении!");
}

$fullname = $user["fullname"];

sendMail("mail.adm.tools", "test@sandstone.kh.ua", "65!3j+!LBiUh", "rofyorug@gmail.com", "New order", "$fullname сделал новый заказ. Посмотрите в приложении!");