<?php
include 'Database.php';
$DB = new Database();

$result = $DB->sendQuery('SELECT * FROM `Devices`');
$data = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>