<?php

require_once ("Db.php");

class Theme {
    public $id;
    public $name;

    public function __construct() {

    }

    /**
     * Returns an array of objects representing all records of the table
     * @returns array<Reference> An array containing instances of all the Themes stored in the database
     */
    public static function all()
    {
        /*
        $references = [];
        $rows = Db::selectMany("SELECT id, name FROM `themes`", []);
        foreach($rows as $row) {
            $r = new Theme();

            $r->id = $row["id"];
            $r->name = $row["name"];

            array_push($references, $r);
        }*/
        return Db::selectMany("SELECT * FROM `themes`", [], Theme::class);
    }

    /**
     * Load data from the database based on this instance's id property
     * @return bool true on success, false otherwise
     */
    public function load() {
        if($this->id == null)
            return false;

        $record = Db::selectOne("SELECT * FROM `themes` WHERE `id`=:id", ["id" => $this->id], Theme::class);
        if($record) {
            $this->name = $record->name;
            return true;
        }
        else {
            $this->name = null;
            $this->id = null;

            return false;
        }
    }

    /**
     * Save the values contained in this instance as a new entry in the database
     * @return bool true on success, false otherwise
     */
    public function save() {
        if($this->name == null)
            return false;

        $stmt = Db::getDbConnection()->prepare("INSERT INTO `themes` (`name`) VALUES (:name);");
        $stmt->bindParam(":name", $this->name);
        $success = $stmt->execute();
        if($success) {
            $this->id = Db::getDbConnection()->lastInsertId();
        }

        return $success;
    }

    /**
     * Updated the values stored in the corresponding database entry based on the values of this instance
     * @return bool true on success, false otherwise
     */
    public function update() {
        return Db::execute("UPDATE `themes` SET `name`=:name WHERE (`id` = :id);", ["id" => $this->id, "name" => $this->name]);
    }

    /**
     * Delete the database entry corresponding to this instance
     * @return bool true on success, false otherwise
     */
    public function delete() {
        if($this->id == null)
            return false;

        /* It's actually impossible to delete the entry.
        Try with choice 1 :
        return Db::execute("DELETE FROM `myforum`.`themes` WHERE (`id` = :id);", ["id" => $this->id]);
        */

        /*return 
        Try with choice 2 :
        */
        $stmt = Db::getDbConnection()->prepare("DELETE FROM `myforum`.`topics` WHERE (`theme_id` = :id);");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        $stmt = Db::getDbConnection()->prepare("DELETE FROM `myforum`.`themes` WHERE (`id` = :id);");
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
        /**/
    }
}