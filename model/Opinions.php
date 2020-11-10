<?php

require_once "db.php";

class Opinions
{
    public $id;
    public $description;
    public $username;
    public $state;


    public static function all()
    {


        $pdo = Db::connect();
        $req = "SELECT `opinions`.`id`, `opinionstate_id` , `opinionstates`.`id` as `opst_id`,`description`,`opinionstates`.`name`, `users`.`pseudo` FROM `opinions`
                INNER JOIN `opinionstates` on `opinionstates`.`id` = `opinionstate_id` 
                INNER JOIN `users` on `user_id` = `users`.`id`";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $Key) {

            $opi = new Opinions();
            $opi->id = $Key['id'];
            $opi->description = $Key['description'];
            $opi->username = $Key['pseudo'];
            $opi->state = $Key['name'];
            $array[] = clone $opi;
        }
        return $array;

    }
}