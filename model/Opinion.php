<?php 

class Opinion{

    public $id;
    public $description;
    public $topic_id;
    public $user_id;
    public $opinionstate_id;
    public $username;
    public $state_name;

    public static function all()
    {

        
        $pdo = Db::connect();
        $req = "SELECT * FROM `opinions`";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $Key) {

            $op = new Opinion();
            $op->id = $Key['id'];
            $op->description = $Key['description'];
            $op->topic_id = $Key['topic_id'];
            $op->user_id = $Key['user_id'];
            $op->opinionstate_id = $Key['opinionstate_id'];
            $array[] = clone $op;
        }
        return $array;

    }
    
    

    

}



?>