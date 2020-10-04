<?php
/**
 * File : db.php
 * Author : D. Ramos
 * Created : 2020-10-02
 * Modified last :
 **/

require_once ("../db.php");

class Theme
{
    public $db;
    public $id;
    public $name;

    public function __construct()
    {
        $this->db = new db();
    }

    public function save()
    {
        $this->db->insertOneRecord("insert into themes values (null, :name)", ["name" => $this->name]);
    }

    public function load()
    {
        $data = $this->db->selectOneRecord("select * from themes where id=:name", ["name" => $this->id]);

        $this->name = $data["name"];
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}