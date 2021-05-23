<?php
    include '../web/Database.php';

    $DB = new Database();

    $input = json_decode(file_get_contents("php://input"), true);

    $userID = $input["userID"];

    if (isset($input["getDeviceOperation"])) {
        $result = $DB->sendQuery("SELECT `users_devices`.`user_device_id`, `users_devices`.`user_id`,
        `users_devices`.`device_id`, `users_devices`.`name`, `users_devices`.`is_activated`, 
        `users_devices`.`activate_date`, `users_devices`.`activation_key`, `devices`.`image`, 
        `devices`.`type`, (SELECT GROUP_CONCAT(CONCAT(`functions`.`function_id`, ':', `functions`.`name`) SEPARATOR ',') 
       FROM `functions` INNER JOIN `devices` ON (`devices`.`device_id`= `functions`.`device_id`) 
       WHERE `devices`.`device_id`= `users_devices`.`device_id`) AS 'FuncName' FROM `users_devices`
       INNER JOIN `devices` ON (`users_devices`.`device_id` = `devices`.`device_id`)
       WHERE `users_devices`.`user_id` = $userID AND `users_devices`.`is_activated` = 1;");

       $userDevices = json_encode($result->fetch_all(), JSON_UNESCAPED_UNICODE);
       echo $userDevices;
    } else if (isset($input["deleteOpearation"])) {
        $scriptID = $input["scriptID"];
        $result = $DB->sendQuery("DELETE FROM `scripts` WHERE `script_id` = $scriptID AND `user_id` = $userID;");

    } else {
        $result = $DB->sendQuery("SELECT `scripts`.`script_id`, `scripts`.`name`, `settings`.`setting_id`, 
        `settings`.`function_id`, `settings`.`user_device_id`, `settings`.`start_time`, `settings`.`end_time` 
        FROM `scripts` INNER JOIN `users` ON (`scripts`.`user_id` = `users`.`user_id`)
        INNER JOIN `settings` ON (`scripts`.`script_id` = settings.`script_id`) WHERE `users`.`user_id` = $userID;");
    
        $userScripts = json_encode($result->fetch_all(), JSON_UNESCAPED_UNICODE);
      
        echo $userScripts;
    }
?>