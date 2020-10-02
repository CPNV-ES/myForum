<?php

require_once "db.php";

class Reference{

    public $name;
    public $id;
    public $description;
    public $url;


    public function save()
    {
        
        $db = new  Db();
        $pdo = $db->connect();
        $req = "INSERT INTO `references`(id,description,url)VALUES(NULL,'".$this->description."','".$this->url."');";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
    }

    public function load()
    {
        
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    
   

}









?>