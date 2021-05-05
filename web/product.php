<?php
include 'Database.php';
$DB = new Database();
// $postData = file_get_contents('php://input');
// $data = json_decode($postData, true);
// echo $_GET['searchField'];
// $out = json_decode(file_get_contents('php://input'));
// echo $out['searchValue'];
// echo $_GET['searchField'];

if (isset($_GET["searchField"]) && trim($_GET["searchField"]) !== '') {
    $param = $_GET["searchField"];
    echo "Hello $param";
    // $result = $DB->sendQuery("SELECT * FROM `Devices` WHERE `name` = '$param' ");
    // $data = $result->fetch_all(MYSQLI_ASSOC);
    // echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    $result = $DB->sendQuery('SELECT * FROM `Devices`');
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

?>