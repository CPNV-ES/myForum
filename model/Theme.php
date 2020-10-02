<?php
require "db.php";
class Theme
{
    public $id;
    public $name;

    public function save()
    {
        $req = "INSERT INTO themes (name) VALUES ('$this->name')";

        execReq($req);
    }

    function load()
    {
        //$req = "INSERT INTO themes (name) VALUES ($this->name)";

        //execReq($req);

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








