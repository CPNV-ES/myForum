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

    public function selectOneRecord($query, $name){
        $query = "select * from myforum.references where id = 1";
        $sth = $this -> dbo->prepare($query);
        //$sth = $this -> $dbo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $sth->execute();
        $datas = $sth->fetchAll();

        print_r($datas);
        /*
        $stmt->bind_param($name, $query);
        $stmt->execute();*/
        return 1;
    }
}