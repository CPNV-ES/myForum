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
        $data = $this->db->selectOneRecord("select * from themes where name=:name", ["name" => $this->name]);

        $this->id = $data['id'];
        $this->name = $data['name'];
    }

    public function load()
    {
        $data = $this->db->selectOneRecord("select * from themes where id=:id", ["id" => $this->id]);

        $this->id = $data['id'];
        $this->name = $data['name'];
    }

    public function update()
    {
        $this->db->updateOneRecord("update themes set name=:name where id=:id", ["name" => $this->name, "id" => $this->id]);
    }

    public function delete()
    {
        $this->db->deleteOneRecord("delete from themes where id=:id", ["id" => $this->id]);
    }
}