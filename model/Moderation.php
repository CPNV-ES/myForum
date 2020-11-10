<?php

require_once("Db.php");

class Moderation
{
    public $id;
    public $pseudo;
    public $opinion;
    public $state;

    public function __construct()
    {

    }

    /**
     * Returns an array of objects representing all records of the table
     * @returns array<Reference> An array containing instances of all the References stored in the database
     */
    public static function all()
    {
        return Db::selectMany("select * from opinions as op inner join users as us on us.id = op.user_id inner join states as st on st.id = op.opinionstate_id", [], "Moderation");
    }

    /**
     * Load data from the database based on this instance's id property
     * @return bool true on success, false otherwise
     */
    public function load()
    {
        if ($this->id == null)
            return false;

        $record = Db::selectOne("SELECT description, url FROM `references` WHERE `id`=:id", ["id" => $this->id], "Reference");
        if ($record) {
            $this->description = $record->description;
            $this->url = $record->url;

            return true;
        } else {
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
    public function save()
    {
        if ($this->description == null)
            return false;

        $this->id = Db::insert("INSERT INTO `references` (`description`, `url`) VALUES (:description, :url);", ["description" => $this->description, ":url" => $this->url]);
        return $this->id;
    }

    /**
     * Updated the values stored in the corresponding database entry based on the values of this instance
     * @return bool true on success, false otherwise
     */
    public function update()
    {
        return Db::execute("UPDATE `references` SET `description`=:description, `url`=:url WHERE (`id` = :id);", ["id" => $this->id, "description" => $this->description, "url" => $this->url]);
    }

    /**
     * Delete the database entry corresponding to this instance
     * @return bool true on success, false otherwise
     */
    public function delete()
    {
        if($this->id == null)
            return false;
        
        $stmt = Db::getDbConnection()->prepare("DELETE FROM `opinions_has_references` WHERE (`reference_id` = :id);");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

        $stmt = Db::getDbConnection()->prepare("DELETE FROM `references` WHERE (`id` = :id);");
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}