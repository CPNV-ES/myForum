<?php

require_once("Db.php");

class OpinionState {
    public $id;
    public $name;

    /**
     * Returns an array of objects representing all records of the table
     * @returns array<Reference> An array containing instances of all the References stored in the database
     */
    public static function all() {
        return Db::selectMany("SELECT * FROM `opinionstates`", [], "OpinionState");
    }


    /**
     * Load data from the database based on this instance's id property
     * @return bool true on success, false otherwise
     */
    public function load() {
        if ($this->id == null)
            return false;

        Db::getDbConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $record = Db::selectOneToArray("SELECT name FROM `opinionstates` WHERE `id`=:id",
            ["id" => $this->id]);

        if ($record) {
            $this->name = $record["name"];

            return true;
        } else {
            $this->id = null;
            $this->name = null;

            return false;
        }
    }
}