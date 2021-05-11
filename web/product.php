<?php
include 'Database.php';
$DB = new Database();
// $input = file_get_contents('php://input');
// $input2 = json_decode($input);
// $input = '{a:5}';
// $input2 = json_encode($input);
// echo $input2;
$filtered_a = filter_var($input2['searchValue'], FILTER_SANITIZE_NUMBER_INT);

if (isset($_POST["searchField"]) && trim($_GET["searchField"]) !== '') {
    $param = $_POST["searchField"];
    echo "Hello $param";
    // $result = $DB->sendQuery("SELECT * FROM `Devices` WHERE `name` = '$param' ");
    // $data = $result->fetch_all(MYSQLI_ASSOC);
    // echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    $result = $DB->sendQuery('SELECT `Devices`.`device_id`, `Categories`.`name` AS "categoriaName", `Devices`.`image`, `Devices`.`name`, `Devices`.`type`, `Devices`.`count`, `Devices`.`price`, `Devices`.`description` FROM `Devices` 
    INNER JOIN `Categories` ON (`Devices`.`categoria_id` = `Categories`.`categoria_id`);');
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

?>