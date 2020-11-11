<?php

require_once("Db.php");

class OpinionState
{
    public $id;
    public $name;

    public function __construct()
    {

    }

    /**
     * Returns an array of objects representing all Opinion states of the table
     */
    public static function all()
    {
        $all = Db::selectMany("SELECT * FROM `opinionstates`", [], "OpinionState");
        return $all;
    }

}
