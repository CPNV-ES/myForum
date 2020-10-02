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
    public $id;
    public $name;

    public function save() {
        insertOneRecord("insert into themes values ()", ["name" => "testing"]);
    }

    public function load() {

    }

    public function update() {

    }

    public function delete() {

    }
}