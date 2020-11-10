<?php


class Opinion
{
    public $id;
    public $description;
    public $topic_id;
    public $user_id;
    public $opinionstate_id;

    public function __construct() {

    }

    /**
     * Returns an array of objects representing all records of the table
     */
    public static function all()
    {
        return Db::selectMany("SELECT * FROM `opinions` INNER JOIN `users` ON `opinions`.`user_id` = `users`.`id` INNER JOIN `opinionstates` ON `opinions`.`opinionstate_id` = `opinionstates`.`id`", [], "Opinion");
    }
}