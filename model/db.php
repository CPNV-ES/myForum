<?php

class DataBase
{

    /**
     * DataBase constructor.
     */
    public static $dbo;

    public function __construct()
    {
        //Get the configuration from config.ini and put-it into variables.
        $config  = parse_ini_file("config.ini");
        $dbo = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['db'], $config['user'], $config['pass']);
    }

    public static function selectOneRecord($query, $values){
        $sth = $dbo->prepare($query);
        $sth->execute($values);

        $datas = $sth->fetch();
        return $datas;
    }

    public static function insertOneRecord($query, $values)
    {
        $sth = $this -> dbo->prepare($query);
        $sth->execute($values);
    }

}