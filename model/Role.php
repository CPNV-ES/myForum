<?php

require_once ("Db.php");

class Role {
    public $id;
    public $name;

    public function __construct() {

    }

    /**
     * Returns an array of objects representing all records of the table
     * @returns array<Reference> An array containing instances of all the Roles stored in the database
     */
    public static function all()
    {
        $references = [];
        $rows = Db::selectMany("SELECT id, name FROM `roles`", []);
        foreach($rows as $row) {
            $r = new Role();

            $r->id = $row["id"];
            $r->name = $row["name"];

            array_push($references, $r);
        }

        return $references;
    }

    /**
     * Load data from the database based on this instance's id property
     * @return bool true on success, false otherwise
     */
    public function load() {
        if($this->id == null)
            return false;

        $record = Db::selectOne("SELECT name FROM `roles` WHERE `id`=:id", ["id" => $this->id]);
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

        $stmt = Db::getDbConnection()->prepare("INSERT INTO `roles` (`name`) VALUES (:name);");
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
        $stmt = Db::getDbConnection()->prepare("UPDATE `roles` SET `name` = :name WHERE (`id` = :id);");
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

        $stmt = Db::getDbConnection()->prepare("DELETE FROM `roles` WHERE (`id` = :id);");
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}