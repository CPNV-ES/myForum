<?php

require_once ("db.php");

/**
*
*/
class Reference
{
    private $db;
    public $id = 0;
    public $description;
    public $url;

    function __construct()
    {
        $this->db = new db();
        $this->description = "";
        $this->url = "";
    }

    function save()
    {
        if ($this->description != null && $this->description != "")
        {
            $this->db->newReference(
                [
                    'description' => "testing",
                    'url' => $this->url,
                ]
            );
        }
    }

    function load()
    {

    }

    function update()
    {

    }

    function delete()
    {

    }
}


?>
