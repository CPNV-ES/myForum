<?php

require_once("Db.php");

class Opinion
{
    public $id;
    public $description;
    public $topic_id;
    public $user_id;
    public $opinionstate_id;

    public function __construct()
    {

    }

    /**
     * Returns an array of objects representing all records of the table
     */
    public static function all()
    {
        return Db::selectMany("SELECT * FROM `opinions`
            INNER JOIN `topics` ON `topics`.`id` = `opinions`.`topic_id`
            INNER JOIN `users` ON `users`.`id` = `opinions`.`user_id`
            INNER JOIN `opinionstates` ON `opinionstates`.`id` = `opinions`.`opinionstate_id`
            ", [], "Opinion");
    }


    public function load()
    {

    }


    public function save()
    {

    }

    public function update()
    {

    }


    public function delete()
    {

    }
}
