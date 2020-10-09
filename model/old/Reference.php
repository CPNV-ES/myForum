<?php
require "db.php";
class Reference
{
    public $id;
    public $name;
    public $url = 'https://testing.ch';
    private $connect;

    function __construct()
    {
        $this->connect = getDB();
    }


    public function save()
    {
        $result = $this ->connect->prepare("INSERT INTO `references` (`description`, `url`) VALUES (:name, :url)");
        $result->bindParam(":name", $this->name);
        $result->bindParam(":url", $this->url);
        $result->execute();

        $result = $this ->connect->prepare("SELECT `id` FROM `references` WHERE `description`=:name");
        $result->bindParam(":name", $this->name);
        $result->execute();

        $data = $result->fetch();

        $this->id = $data;
    }

    function load()
    {
        $result = $this ->connect->prepare("SELECT `description`, `id` FROM `references` WHERE `id`=:id");
        $result->bindParam(":id", $this->id);
        $result->execute();

        $data = $result->fetch();

        $this->name = $data["description"];
        $this->id = $data["id"];

        return $result->fetch();
    }

    function update()
    {
        $result = $this ->connect->prepare("UPDATE `references` SET `description` = :name WHERE `id` = :id ");
        $result->bindParam(":id", $this->id);
        $result->bindParam(":name", $this->name);
        $result->execute();
    }

    function delete()
    {
        $result = $this ->connect->prepare("DELETE FROM `references` WHERE `description` = :name");
        $result->bindParam(":name", $this->name);
        $result->execute();
    }
}








