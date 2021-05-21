<?php

class Database {
    public $connectionString;

    static function getConnection() {
    	return new mysqli('localhost','root','','homecontrol');
    }

    static function sendQuery($query) {
        $connectionString = Database::getConnection();
        $result = $connectionString->query($query);
        $connectionString->close();
        return $result;
    }
}
