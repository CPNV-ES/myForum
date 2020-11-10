<?php


class OpinionStates
{
    public $id;
    public $name;

    public function __construct() {

    }

    /**
     * Returns an array of objects representing all records of the table
     */
    public static function all()
    {
        return Db::selectMany("SELECT * FROM `opinionstates`", [], "OpinionStates");
    }
}