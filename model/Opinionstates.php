<?php

require_once("Db.php");

class Opinionstates
{
    public $id;
    public $name;

    public function __construct()
    {

    }

    /**
     * Returns an array of objects representing all records of the table
     */
    public static function all()
    {
        return Db::selectMany("SELECT * FROM `opinionstates`", [], "Opinionstates");
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
