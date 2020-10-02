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
        $host    = $config[0];
        $db      = $config[1];
        $user    = $config[2];
        $pass    = $config[3];
        $charset = $config[4];
    }

    public function selectOneRecord($query, $value){
        return $query;
    }
}