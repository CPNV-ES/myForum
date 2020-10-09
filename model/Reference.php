<?php

require_once "db.php";

class Reference{

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
        $this->id =intval($pdo->lastInsertId());
    }

    public function load()
    {
        $db = new  Db();
        $pdo = $db->connect();
        $req = "SELECT * FROM `references` WHERE id=$this->id";
        $stmt = $pdo->prepare($req); 
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(!$result)
        {
            $this->id = null;
        }
        else{
            foreach ($result as $Key) {
                $this->id = $Key['id'];
                $this->description = $Key['description'];
                $this->url = $Key['url'];
            }
        }   
        
    }

    public function update()
    {
        $db = new  Db();
        $pdo = $db->connect();
        $req = "UPDATE `references` SET description=?,url=?  WHERE id = ? ";
        $stmt = $pdo->prepare($req);
        $stmt->execute(array($this->description, $this->url, $this->id));
    }

    public function delete()
    {
        $db = new  Db();
        $pdo = $db->connect();
        $req = "DELETE FROM `references` WHERE id = ?";
        $stmt = $pdo->prepare($req);
        $stmt->execute(array($this->id));
        $this->id =null;
    }

    
   

}
