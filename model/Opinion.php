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

    /**
     * Save the values contained in this instance as a new entry in the database
     * @return bool true on success, false otherwise
     */
    public function save() {
        if($this->description == null)
            return false;

        $stmt = Db::getDbConnection()->prepare('INSERT INTO `opinions` (description,topic_id,user_id,opinionstate_id) VALUES (:description,:topicid,:userid,:opinionstateid);');
        $stmt->bindValue(":description", $this->description);
        $stmt->bindValue(":topicid", $this->topicId);
        $stmt->bindValue(":userid", $this->userId);
        $stmt->bindValue(":opinionstateid", $this->opinionStateId);
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
        $stmt = Db::getDbConnection()->prepare('UPDATE `opinions` SET description = :description, topic_id = :topicid, user_id = :userid, opinionstate_id = :opinionstateid  WHERE (id = :id)');
        $stmt->bindValue(":id", $this->id);
        $stmt->bindValue(":description", $this->description);
        $stmt->bindValue(":topicid", $this->topicId);
        $stmt->bindValue(":userid", $this->userId);
        $stmt->bindValue(":opinionstateid", $this->opinionStateId);
        return $stmt->execute();
    }

    /**
     * Delete the database entry corresponding to this instance
     * @return bool true on success, false otherwise
     */
    public function delete() {
        if($this->id == null)
            return false;

        $stmt = Db::getDbConnection()->prepare("DELETE FROM `opinions` WHERE (`id` = :id);");
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
 }