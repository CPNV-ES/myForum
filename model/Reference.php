<?php

require_once ("Db.php");

class Reference {
    public $id;
    public $description;
    public $url;

    public function __construct() {

    }

    /**
     * Load data from the database based on this instance's id property
     * @return bool true on success, false otherwise
     */
    public function load() {
        if($this->id == null)
            return false;

        $record = Db::selectOneRecord("SELECT description, url FROM `references` WHERE `id`=:id", ["id" => $this->id]);
        if($record) {
            $this->description = $record["description"];
            $this->url = $record["url"];

            return true;
        }
        else {
            $this->description = null;
            $this->url = null;
            $this->id = null;

            return false;
        }
    }

    /**
     * Save the values contained in this instance as a new entry in the database
     * @return bool true on success, false otherwise
     */
    public function save() {
        if($this->description == null)
            return false;

        $stmt = Db::getDbConnection()->prepare("INSERT INTO `references` (`description`, `url`) VALUES (:description, :url);");
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":url", $this->url);

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
        $stmt = Db::getDbConnection()->prepare("UPDATE `references` SET `description`=:description, `url`=:url WHERE (`id` = :id);");
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":url", $this->url);

        return $stmt->execute();
    }

    /**
     * Delete the database entry corresponding to this instance
     * @return bool true on success, false otherwise
     */
    public function delete() {
        if($this->id == null)
            return false;

        $stmt = Db::getDbConnection()->prepare("DELETE FROM `references` WHERE (`id` = :id);");
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}