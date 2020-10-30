<?php

require_once "db.php";

class Reference{

    public $id;
    public $description;
    public $url;


    public static function all()
    {

        
        $pdo = Db::connect();
        $req = "SELECT `id`,`description`,`url` FROM `references`";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $Key) {

            $ref = new Reference();
            $ref->id = $Key['id'];
            $ref->description = $Key['description'];
            $ref->url = $Key['url'];
            $array[] = clone $ref;
        }
        return $array;

    }

    public function save()
    {
        
        $pdo = Db::connect();
        $req = "INSERT INTO `references`(id,description,url)VALUES(NULL,'".$this->description."','".$this->url."');";
        $stmt = $pdo->prepare($req);

        $stmt->execute();
        $this->id =intval($pdo->lastInsertId());
    }

    public function load()
    {
        $pdo = Db::connect();
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

    public static function update($id,$description,$url)
    {
        $pdo = Db::connect();
        $req = "UPDATE `references` SET description=?,url=?  WHERE id = ? ";
        $stmt = $pdo->prepare($req);
        $stmt->execute(array($description, $url, $id));
    }

    public static function delete($id)
    {
        $pdo = Db::connect();
        $req = "DELETE FROM `opinions_has_references` WHERE reference_id = ?";
        $stmt = $pdo->prepare($req);
        $stmt->execute(array($id));

        $req = "DELETE FROM `references` WHERE id = ?";
        $stmt = $pdo->prepare($req);
        $stmt->execute(array($id));
        
    }

    
   

}
