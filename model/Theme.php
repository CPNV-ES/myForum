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
        $this->db->insertOneRecord("insert into themes values (null, '" . $this->name . "')");
    }

    public function load()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}