<?php

class Database {
    public $connectionString;

    static function getConnection() {
    	return new mysqli('localhost','gazobe07_home','ja3RL+7f5!','gazobe07_home');
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
