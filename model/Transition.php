<?php


class Transition
{
    public $id;
    public $from_id;
    public $to_id;

    public function __construct() {

    }

    /**
     * Returns an array of objects representing all records of the table
     */
    public static function all()
    {
        return Db::selectMany("SELECT * FROM `opinionstatetransitions` INNER JOIN `opinionstates` ON `opinionstatetransitions`.`from_id` = `opinionstates`.`id` INNER JOIN `opinionstates` ON `opinionstatetransitions`.`to_id` = `opinionstates`.`id`", [], "Opinion");
    }
}