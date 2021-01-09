<?php

class Dbh 
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "blog";

    protected function connect()
    {
        // data sourcce name - what type of db we will be using 

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn,$this->user,$this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }

}