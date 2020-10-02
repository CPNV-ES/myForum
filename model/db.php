<?php 
/**
 * File : db.php
 * Author : A. Quentin
 * Created : 2020-10-02
 * Modified last : 2020-10-02
 **/

class Db{
    protected $dbEnv = null;
    protected $dbConnection = null;

    /**
     * Load and initialize the connection with the database using environnement variable.
     */
    public function _construct($envPath = '../env.json'){
        $json = file_get_contents($envPath);

        $this->dbEnv = json_decode($json)["db"];

        if(empty($dbConnection)){
            $dsn = 'mysql:host=' . $dbEnv["host"].';dbname='.$dbEnv["name"];

            $dbConnection = new PDO($dsn,$dbEnv["login"]["username"],$dbEnv["login"]["password"]);
        } 

        var_dump($this->dbEnv);
    }

    /**
     * This function try to select an entry in the database
     * @param string $req 
     * @param array $values
     * @return array $entry
     */
    public static function selectOneRecord($req,$values = null){

        $this->dbConnection->prepare($req);
        $this->dbConnection->execute($values);

        return $this->dbConnection->fetchAll();
    }
}