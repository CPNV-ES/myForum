<?php

require_once "config.php";
class Db{
    
    public static function connect()
    {
        $config = new config();
        $connexion = new PDO('mysql:host='.$config->host.'; dbname='.$config->databaseName, $config->username , $config->password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    }
}
