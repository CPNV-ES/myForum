<?php
require "db.php";
class Theme
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
        $result = $this->connect->prepare("SELECT * FROM `themes`");
        $result->execute();
        $obj = $result->fetchAll(PDO::FETCH_ASSOC, "Theme");
        return $obj;

    }

    public function save()
    {
        $result = $this ->connect->prepare("INSERT INTO `themes` (`name`) VALUES (:name)");
        $result->bindParam(":name", $this->name);
        $result->execute();

        $result = $this ->connect->prepare("SELECT `id` FROM `themes` WHERE `name`=:name");
        $result->bindParam(":name", $this->name);
        $result->execute();

        $data = $result->fetch();

        $this->id = $data;
    }

    function load()
    {
        $result = $this ->connect->prepare("SELECT `name`, `id` FROM `themes` WHERE `id`=:id");
        $result->bindParam(":id", $this->id);
        $result->execute();

        $data = $result->fetch();

        $this->name = $data["name"];
        $this->id = $data["id"];

        return $result->fetch();
    }

    function update()
    {
        $result = $this ->connect->prepare("UPDATE `themes` SET `name` = :name WHERE `id` = :id ");
        $result->bindParam(":id", $this->id);
        $result->bindParam(":name", $this->name);
        $result->execute();
    }

    function delete()
    {
        $result = $this ->connect->prepare("DELETE FROM `themes` WHERE `name` = :name");
        $result->bindParam(":name", $this->name);
        $result->execute();
    }
}








