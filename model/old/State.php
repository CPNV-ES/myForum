<?php
require "db.php";
class State
{
    public $id;
    public $name;
    private $connect;

    function __construct()
    {
        $this->connect = getDB();
    }


    public function save()
    {
        $result = $this->connect->prepare("INSERT INTO `states` (`name`) VALUES (:name)");
        $result->bindParam(":name", $this->name);
        $result->execute();

        $result = $this->connect->prepare("SELECT `id` FROM `states` WHERE `name`=:name");
        $result->bindParam(":name", $this->name);
        $result->execute();

        $data = $result->fetch();

        $this->id = $data;
    }

    function load()
    {
        $result = $this->connect->prepare("SELECT `name`, `id` FROM `states` WHERE `id`=:id");
        $result->bindParam(":id", $this->id);
        $result->execute();

        $data = $result->fetch();

        $this->name = $data["name"];
        $this->id = $data["id"];

        return $result->fetch();
    }

    function update()
    {
        $result = $this->connect->prepare("UPDATE `states` SET `name` = :name WHERE `id` = :id ");
        $result->bindParam(":id", $this->id);
        $result->bindParam(":name", $this->name);
        $result->execute();
    }

    function delete()
    {
        $result = $this->connect->prepare("DELETE FROM `states` WHERE `name` = :name");
        $result->bindParam(":name", $this->name);
        $result->execute();
    }
}








