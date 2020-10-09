<?php

class DataBase
{

    /**
     * DataBase constructor.
     */
    private $dbo;

    public function __construct()
    {
        //Get the configuration from config.ini and put-it into variables.
        $config  = parse_ini_file("config.ini");
        $this -> dbo = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['db'], $config['user'], $config['pass']);
    }

    public function selectOneRecord($query, $values){
        $sth = $this -> dbo->prepare($query);
        $sth->execute($values);

        $datas = $sth->fetch();
        return $datas;
    }

    public function insertOneRecord($query, $values)
    {
        $sth = $this -> dbo->prepare($query);
        $sth->execute($values);
    }

}