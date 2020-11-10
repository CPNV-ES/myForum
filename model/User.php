<?php 

class User{

    public $id;
    public $first_name;
    public $last_name;
    public $pseudo;
    public $role_id;

    public static function getUsernameById($userId){

        $pdo = Db::connect();
        $req = "SELECT * FROM `users` WHERE id=$userId";
        $stmt = $pdo->prepare($req); 
        $stmt->execute();
        $result = $stmt->fetch();
        if(!$result)
        {
            $id = null;
        }
        else{
            return $result['pseudo'];
        } 
    }
}

?>