<?php 

class State{
    public $id;
    public $name;

    public static function all()
    {

        
        $pdo = Db::connect();
        $req = "SELECT * FROM `states`";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $Key) {

            $st = new State();
            $st->id = $Key['id'];
            $st->name = $Key['name'];
            $array[] = clone $st;
            
        }
        return $array;

    }

    public static function getStateById($stateId){
        
        $pdo = Db::connect();
        $req = "SELECT * FROM `states` WHERE id=$stateId";
        $stmt = $pdo->prepare($req); 
        $stmt->execute();
        $result = $stmt->fetch();
        if(!$result)
        {
            $id = null;
        }
        else{
            return $result['name'];
        } 

    }
}





?>