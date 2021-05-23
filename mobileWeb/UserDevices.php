<?php
    include '../web/Database.php';

    $DB = new Database();
    
    $input = json_decode(file_get_contents("php://input"), true);
    $userID = $input["userID"];

    if (isset($input["deleteOpearation"])) {
      $deviceID = $input["deviceID"];
      $result = $DB->sendQuery("UPDATE `users_devices` SET `user_devices`.`is_activated` = 0 WHERE `user_device_id` = $deviceID AND `user_id` = $userID;");
    } else if (isset($input["addOperation"])) {
      $deviceName = $input["name"];
      $deviceKey = $input["deviceKey"];
      $result = $DB->sendQuery("UPDATE `users_devices` SET `is_activated` = 1, `name` = '$deviceName' WHERE `activation_key` = '$deviceKey' AND `user_id` = $userID;");
    } else {
      $result = $DB->sendQuery("SELECT `users_devices`.`user_device_id`, `users_devices`.`user_id`,
       `users_devices`.`device_id`, `users_devices`.`name`, `users_devices`.`is_activated`, 
       `users_devices`.`activate_date`, `users_devices`.`activation_key`, `devices`.`image`, 
       `devices`.`type`, (SELECT GROUP_CONCAT(`functions`.`name` SEPARATOR ',') 
      FROM `functions` INNER JOIN `devices` ON (`devices`.`device_id`= `functions`.`device_id`) 
      WHERE `devices`.`device_id`= `users_devices`.`device_id`) AS 'FuncName' FROM `users_devices`
      INNER JOIN `devices` ON (`users_devices`.`device_id` = `devices`.`device_id`)
      WHERE `users_devices`.`user_id` = $userID AND `users_devices`.`is_activated` = 1;");
      
      $userDevices = json_encode($result->fetch_all(), JSON_UNESCAPED_UNICODE);
  
      echo $userDevices;
    }
?>