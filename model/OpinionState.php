<?php

require_once("Db.php");

class OpinionState {
    public $id;
    public $name;

    public static function all() {
        $opinionstates = [];
        $ids = Db::selectManyToArray("SELECT id from `opinionstates`;", []);
        foreach($ids as $id) {
            $op = new OpinionState();
            $op->id = $id["id"];
            $op->load();

            array_push($opinionstates, $op);
        }

        return $opinionstates;
    }

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