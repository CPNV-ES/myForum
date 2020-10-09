<?php

require_once ("Db.php");

class Reference {
    public $id;
    public $description;
    public $url;

    public function __construct() {

    }

    /**
     * Returns an array of objects representing all records of the table
     */
    public static function all()
    {
        // TODO Build and return an array of Reference objects
    }

    /**
     * Load data from the database based on this instance's id property
     * @return bool true on success, false otherwise
     */
    public function load() {
        if($this->id == null)
            return false;

        $record = Db::selectOne("SELECT description, url FROM `references` WHERE `id`=:id", ["id" => $this->id]);
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

        $this->id = Db::insert("INSERT INTO `references` (`description`, `url`) VALUES (:description, :url);",["description" => $this->description, ":url" => $this->url]);
        return $this->id;
    }

    /**
     * Updated the values stored in the corresponding database entry based on the values of this instance
     * @return bool true on success, false otherwise
     */
    public function update() {
        return Db::execute("UPDATE `references` SET `description`=:description, `url`=:url WHERE (`id` = :id);",["id" => $this->id, "description" => $this->description, "url" => $this->url]);
    }

    /**
     * Delete the database entry corresponding to this instance
     * @return bool true on success, false otherwise
     */
    public function delete() {
        if($this->id == null)
            return false;
        return Db::execute("DELETE FROM `references` WHERE (`id` = :id);",["id" => $this->id]);
    }
}
