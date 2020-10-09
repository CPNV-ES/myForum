<?php
require "db.php";
class State
{
    public $id;
    public $name;

    public function save()
    {
        $req = "INSERT INTO `states` (`name`) VALUES ('$this->name')";

        ExecReq($req);

        $req2 = "SELECT `id` FROM `states` WHERE `name`='$this->name'";

        $data = ReturnExecReq($req2)["id"];

        $this->id = $data;
    }

    function load()
    {
        $req = "SELECT `name`, `id` FROM `states` WHERE `id`=$this->id";

        $this->name = ReturnExecReq($req)["name"];
        $this->id = ReturnExecReq($req)["id"];

    }

    function update()
    {

        $req = "UPDATE `states` SET `name` = '$this->name' WHERE `id` = $this->id ";
        
        ExecReq($req);
    }

    function delete()
    {
        $req = "DELETE FROM `states` WHERE `name` = '$this->name'";

        ExecReq($req);
    }
}








