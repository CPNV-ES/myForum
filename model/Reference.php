<?php
require "db.php";
class Reference
{
    public $id;
    public $name;

    public function save()
    {
        $req = "INSERT INTO `references` (`description`, `url`) VALUES ('$this->name', 'https://testing.ch')";

        ExecReq($req);

        $req2 = "SELECT `id` FROM `references` WHERE `description`='$this->name'";

        $data = ReturnExecReq($req2)["id"];

        $this->id = $data;
    }

    function load()
    {
        $req = "SELECT `description`, `id` FROM `references` WHERE `id`=$this->id";

        $this->name = ReturnExecReq($req)["description"];
        $this->id = ReturnExecReq($req)["id"];

    }

    function update()
    {

        $req = "UPDATE `references` SET `description` = '$this->name' WHERE `id` = $this->id ";
        
        ExecReq($req);
    }

    function delete()
    {
        $req = "DELETE FROM `references` WHERE `description` = '$this->name'";

        ExecReq($req);
    }
}








