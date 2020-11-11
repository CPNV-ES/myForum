<?php

require_once("Db.php");

class Opinion
{
    public $id;
    public $description;
    public $state;
    public $opinionstate_id;
    public $author;

    public function __construct()
    {

    }

    /**
     * Returns an array of objects representing all records of the table
     */
    public static function all()
    {
        $all = Db::selectMany("SELECT * FROM `opinions`", [], "Opinion");
        // Eager loading to have state and author name
        for ($i = 0; $i < count($all); $i++) {
            $all[$i]->load();
        }
        return $all;
    }

    /**
     * Load data from the database based on this instance's id property
     * @return bool true on success, false otherwise
     */
    public function load()
    {
        if ($this->id == null)
            return false;
        $record = Db::selectOne("SELECT opinions.id, opinionstate_id, description, pseudo, name FROM `opinions` INNER JOIN opinionstates ON opinionstates.id = opinionstate_id INNER JOIN users on user_id = users.id WHERE opinions.id=:id", ["id" => $this->id],"Opinion");
        if ($record) {
            $this->description = $record->description;
            $this->author = $record->pseudo;
            $this->state = $record->name;
            $this->opinionstate_id = $record->opinionstate_id;
            return true;
        } else {
            $this->id = null;
            return false;
        }
    }

}
