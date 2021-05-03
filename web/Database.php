<?php

class Database {
    public $connectionString;

    function sendQuery($query) {
        $connectionString = new mysqli('localhost','root','root','HomeControl');
        $result = $connectionString->query($query);
        $connectionString->close();
        return $result;
    }
}