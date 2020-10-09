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

    public function selectOneRecord($query, $id){
        $sth = $this -> dbo->prepare($query);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->execute();

        $datas = $sth->fetchAll();
        print_r($datas);

        return 1;
    }
}