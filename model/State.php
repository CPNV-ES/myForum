<?php

require_once ("Db.php");

class State {
    public $id;
    public $name;

    public function __construct() {

    }

    /**
     * Returns an array of objects representing all records of the table
     */
    public static function all()
    {
        return Db::selectMany("SELECT * FROM `states`", [], "State");
    }

    /**
     * Load data from the database based on this instance's id property
     * @return bool true on success, false otherwise
     */
    public function load() {
        if($this->id == null)
            return false;

        $record = Db::selectOne("SELECT name FROM `states` WHERE `id`=:id", ["id" => $this->id]);
        if($record) {
            $this->name = $record["name"];

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

        $stmt = Db::getDbConnection()->prepare("INSERT INTO `states` (`name`) VALUES (:name);");
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
        $stmt = Db::getDbConnection()->prepare("UPDATE `states` SET `name` = :name WHERE (`id` = :id);");
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        return $stmt->execute();
    }

    /**
     * Delete the database entry corresponding to this instance
     * @return bool true on success, false otherwise
     */
    public function delete() {
        if($this->id == null)
            return false;

        $stmt = Db::getDbConnection()->prepare("DELETE FROM `states` WHERE (`id` = :id);");
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}