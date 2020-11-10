<?php

require_once "config.php";
class Db{
    
    public static function connect()
    {
        $config = new config();
        $connexion = new PDO('mysql:host='.$config->host.'; dbname='.$config->databaseName, $config->username , $config->password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Enable exception warning
        return $connexion;
    }

    public function selectOneRecord($req,$name)
    {
        $pdo = Db::connect();
        $stmt = $pdo->prepare($req);//Protect from injection
        $stmt->execute($name);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetch();
        return $data;
    }

}
