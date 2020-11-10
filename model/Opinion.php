<?php
/**
 * Author : Quentin Aellen
 * Created at : 10 november 2020
 */

 require_once("Db.php");

 class Opinion {
    public $id;
    public $description;
    private $topicId;
    private $userId;
    private $opinionStateId;

    /**
     * Load data from the database based on this instance's id property
     * @return bool true on success, false otherwise
     */
    public function load() {
        if($this->id == null)
            return false;

        $record = Db::selectOneRecord("SELECT description,topic_id,user_id,opinionstate_id  FROM `opinions` WHERE `id`=:id", ["id" => $this->id]);
        if($record) {
            $this->description = $record["description"];
            $this->topicId = $record["topic_id"];
            $this->userId = $record["user_id"];
            $this->opinionStateId = $record["opinionstate_id"];
            return true;
        }
        else {
            $this->description = null;
            $this->topicId = null;
            $this->userId = null;
            $this->opinionStateId = null;

            return false;
        }
    }
 }