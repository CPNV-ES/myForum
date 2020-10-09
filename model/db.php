<?php

require_once "config.php";
class Db{
    
    public function connect()
    {
        $config = new config();
        $connexion = new PDO('mysql:host='.$config->host.'; dbname='.$config->databaseName, $config->username , $config->password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    }

    public function selectOneRecord($req,$name)
    {
        $pdo = $this->connect();

        $stmt = $pdo->prepare($req);//Protect from injection
        
    
        foreach($name as $key=>$value)
        {
            $stmt->bindParam(":".$key,$value);
        }
        
        $stmt->debugDumpParams();
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetch();
        return $data;
    }

}
