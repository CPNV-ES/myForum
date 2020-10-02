<?php

class DataBase
{

    /**
     * DataBase constructor.
     */
    private $dbh;

    public function __construct()
    {
        //Get the configuration from config.ini and put-it into variables.
        $config  = parse_ini_file("config.ini");
        $this -> dbh = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['db'], $config['user'], $config['pass']);
    }

    public function selectOneRecord($query, $name){
        $stmt = $this -> $dbh->prepare($query);

        $stmt->bind_param($name, $query);
        $stmt->execute();
        echo $stmt;
    }
}