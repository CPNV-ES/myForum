<?php

class DataBase
{

    /**
     * DataBase constructor.
     */
    public function __construct()
    {
        //Get the configuration from config.ini and put-it into variables.
        $config  = parse_ini_file("config.ini");
        $dbh = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['db'], $config['user'], $config['pass']);
    }

    public function selectOneRecord($query, $value){
        return $query;
    }
}