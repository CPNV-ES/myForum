<?php
/**
 * Author : M. Burnat
 * Created : 2020-10-02
 * Modified last : 2020-10-02
 **/
require_once ("../db.php");
$db = new DataBase();

class Reference
{
    /**
     * @var string
     */
    public $description;
    /**
     * @var int
     */
    public $id;

    /**
     * Reference constructor.
     */
    public function __construct()
    {
    }

    public function save()
    {
        $db->insertOneRecord();
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