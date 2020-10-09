<?php
/**
 * File : Db.php
 * Author : D. Ramos
 * Created : 2020-10-02
 * Modified last : 2020-10-09
 **/

require_once ("../Db.php");

/**
 * Class Theme
 * This class is used to deal with the themes
 */
class Theme
{
    public $db;
    public $id;
    public $name;

    public function __construct()
    {
        $this->db = new Db();
    }

    /**
     * This method is used to save a theme
     */
    public function save()
    {
        $this->db->insertOneRecord("insert into themes values (null, :name)", ["name" => $this->name]);
        $data = $this->db->selectOneRecord("select * from themes where name=:name", ["name" => $this->name]);

        $this->id = $data['id'];
        $this->name = $data['name'];
    }

    /**
     * This method is used to load a theme
     */
    public function load()
    {
        $data = $this->db->selectOneRecord("select * from themes where id=:id", ["id" => $this->id]);

        $this->id = $data['id'];
        $this->name = $data['name'];
    }

    /**
     * This method is used to update a theme
     */
    public function update()
    {
        $this->db->updateOneRecord("update themes set name=:name where id=:id", ["name" => $this->name, "id" => $this->id]);
    }

    /**
     * This method is used to delete a theme
     */
    public function delete()
    {
        $this->db->deleteOneRecord("delete from themes where id=:id", ["id" => $this->id]);
    }
}