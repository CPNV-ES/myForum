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
    }

    function load()
    {
        $req = "SELECT `name` FROM `themes` WHERE `id`=$this->id";


        $this->name = ReturnExecReq($req)["name"];

    }

    function update()
    {
        //$req = "INSERT INTO themes (name) VALUES ($this->name)";

       // execReq($req);
    }

    function delete()
    {
       // $req = "INSERT INTO themes (name) VALUES ($this->name)";

       // execReq($req);
    }
}








