<?php

require_once("Db.php");

class Opinion {
    public $id;
    public $description;
    public $state;
    public $user_pseudo;

    /**
     * Returns an array of objects representing all records of the table
     * @returns array<Reference> An array containing instances of all the References stored in the database
     */
    public static function all() {
        $opinions = [];
        $ids = Db::selectManyToArray("SELECT id from `opinions`;", []);
        foreach($ids as $id) {
            $op = new Opinion();
            $op->id = $id["id"];
            $op->load();

            array_push($opinions, $op);
        }

        return $opinions;
    }

    /**
     * Load data from the database based on this instance's id property
     * @return bool true on success, false otherwise
     */
    public function load() {
        if ($this->id == null)
            return false;

        Db::getDbConnection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $record = Db::selectOneToArray("
            SELECT description as description, users.pseudo as user_pseudo, opinionstates.name as opinionstate_name
            FROM `opinions` 
            INNER JOIN users ON users.id = opinions.user_id
            INNER JOIN opinionstates on opinionstates.id = opinionstate_id
            WHERE `opinions`.`id`=:id",
            ["id" => $this->id]);
        

        if ($record) {
            $this->description = $record["description"];
            $this->user_pseudo = $record["user_pseudo"];
            $this->state = $record["opinionstate_name"];

            return true;
        } else {
            $this->id = null;
            $this->description = null;
            $this->user_pseudo = null;
            $this->state = null;

            return false;
        }
    }
}