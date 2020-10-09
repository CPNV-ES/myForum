<?php
/**
 * File : Role.php
 * Author : A. Quentin
 * Created : 2020-10-02
 * Modified last : 2020-10-02
 **/


class Role{
    public $id;
    public $name;
    public $db;

    public function __construct($db = null){
        $this->db = $db;
    }

    /**
     * This method will insert in the database a new entry with current information
     */
    public function save(){
        $req = '';

        $values = [];

        if (!empty($this->id)){
            $this->update();
        }
        else{
            $req = 'INSERT INTO roles (name) VALUES (:name)';
            $values["name"] = $this->name;
            $sth = $this->db->dbConnection->prepare($req);
            $state = $sth->execute($values);
            $this->id = $this->db->dbConnection->lastInsertId();
        }       

        

        $this->load();
    }

    /**
     * This method try to load information in database based on object properties informations.
     */
    public function load(){
        $req = "SELECT * FROM roles WHERE id=:id";

        if(!empty($this->id)){
            $sth = $this->db->dbConnection->prepare($req);
            $sth->execute(["id" => $this->id]);
            $values = $sth->fetch();            

            $this->name = $values["name"];
        }
    }

    /**
     * This method try to update the database entry based on object properties informations
     */
    public function update(){
        $values = [];

        if (!empty($this->id)){
            $req = 'UPDATE roles SET name =:name WHERE id=:id';
            $values["id"] = $this->id;
            $values["name"] = $this->name;
        }

        $sth = $this->db->dbConnection->prepare($req);
        $state = $sth->execute($values);
    }

    /**
     * This method try to delete the database entry bases on object properties informations
     */
    public function delete(){

    }
}   