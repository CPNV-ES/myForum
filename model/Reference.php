<?php

require_once ("db.php");

/**
*
*/
class Reference
{
    private $db;
    public $id = null;
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
            $this->id = $this->db->insertOneRecord(
                "INSERT INTO `references` (`description`, `url`) VALUES (:description, :url)",
                [
                    'description' => $this->description,
                    'url' => $this->url,
                ]
            );
        }
    }

    function load()
    {
        if ($this->id != null)
        {
            $result = $this->db->selectOneRecord(
                "SELECT * FROM `references` WHERE id=:id",
                [
                    'id' => $this->id,
                ]
            );

            // Si le résultat n'est pas vide garde les valeurs
            if ($result > 0)
            {
                $this->description = $result['description'];
                $this->url = $result['url'];
            }
            // Supprime l'id
            else {
                $this->id = null;
            }
        }
    }

    function update()
    {
        if ($this->id != null && $this->description != null && $this->description != "")
        {
            $result = $this->db->updateOneRecord(
                "UPDATE `references` SET description=:description, url=:url WHERE id=:id",
                [
                    'id' => $this->id,
                    'description' => $this->description,
                    'url' => $this->url,
                ]
            );

            // Si le résultat n'est pas vide garde les valeurs
            if ($result > 0)
            {
                $this->description = $result['description'];
                $this->url = $result['url'];
            }
            // Supprime l'id
            else {
                $this->id = null;
            }
        }
    }

    function delete()
    {
        if ($this->id != null)
        {
            $result = $this->db->deleteOneRecord(
                "DELETE FROM `references` WHERE id=:id",
                [
                    'id' => $this->id,
                ]
            );

            $this->id = null;
            $this->description = "";
            $this->url = "";
        }
    }
}


?>
