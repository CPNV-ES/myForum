<?php
require "db.php";
class Role
{
    public $id;
    public $name;
    private $connect;

    function __construct()
    {
        $this->connect = getDB();
    }
    /**
     * Returns an array of objects representing all records of the table
     */
    public function all()
    {
        //TODO Build and return an array of Reference objects
        $result = $this->connect->prepare("SELECT * FROM `roles`");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function save()
    {
        $result = $this->connect->prepare("INSERT INTO `roles` (`name`) VALUES (:name)");
        $result->bindParam(":name", $this->name);
        $result->execute();

        $result = $this->connect->prepare("SELECT `id` FROM `roles` WHERE `name`=:name");
        $result->bindParam(":name", $this->name);
        $result->execute();

        $data = $result->fetch();

        $this->id = $data;
    }

    function load()
    {
        $result = $this->connect->prepare("SELECT `name`, `id` FROM `roles` WHERE `id`=:id");
        $result->bindParam(":id", $this->id);
        $result->execute();

        $data = $result->fetch();

        $this->name = $data["name"];
        $this->id = $data["id"];

        return $result->fetch();
    }

    function update()
    {
        $result = $this->connect->prepare("UPDATE `roles` SET `name` = :name WHERE `id` = :id ");
        $result->bindParam(":id", $this->id);
        $result->bindParam(":name", $this->name);
        $result->execute();
    }

    function delete()
    {
        $result = $this->connect->prepare("DELETE FROM `roles` WHERE `name` = :name");
        $result->bindParam(":name", $this->name);
        $result->execute();
    }
}