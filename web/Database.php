<?php

class Database {
    public $connectionString;

    static function getConnection() {
    	$mysqli = new mysqli('gazobe07.mysql.tools','gazobe07_home','ja3RL+7f5!','gazobe07_home');
        $mysqli->set_charset("utf8mb4");
        return $mysqli;
    }

    static function sendQuery($query) {
        $connectionString = Database::getConnection();
        $result = $connectionString->query($query);

        if (!$result) {
            echo $connectionString->error;
            exit;
        }

        $connectionString->close();

        return $result;
    }
}
