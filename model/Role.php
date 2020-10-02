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
    public $dbConnection;

    public function _construct($dbConnection = null){
        $this->dbConnection = $dbConnection;
    }

    /**
     * This method will insert in the database a new entry with current information
     */
    public function save(){

    }

    /**
     * This method try to load information in database based on object properties informations.
     */
    public function load(){

    }

    /**
     * This method try to update the database entry based on object properties informations
     */
    public function update(){

    }

    /**
     * This method try to delete the database entry bases on object properties informations
     */
    public function delete(){

    }
}   