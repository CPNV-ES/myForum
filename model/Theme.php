<?php
require "db.php";
class Theme
{
    public $id;
    public $name;

    public function save()
    {
        $req = "INSERT INTO `themes` (`name`) VALUES ('$this->name')";

        ExecReq($req);

        $req2 = "SELECT `id` FROM `themes` WHERE `name`='$this->name'";

        $data = ReturnExecReq($req2)["id"];

        $this->id = $data;
    }

    function load()
    {
        $req = "SELECT `name`, `id` FROM `themes` WHERE `id`=$this->id";

        $this->name = ReturnExecReq($req)["name"];
        $this->id = ReturnExecReq($req)["id"];

    }

    function update()
    {

        $req = "UPDATE `themes` SET `name` = '$this->name' WHERE `id` = $this->id ";
        
        ExecReq($req);
    }

    function delete()
    {
        $req = "DELETE FROM `themes` WHERE `name` = '$this->name'";

        ExecReq($req);
    }
}








