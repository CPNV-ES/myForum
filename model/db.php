<?php 
/**
 * File : db.php
 * Author : A. Quentin
 * Created : 2020-10-02
 * Modified last : 2020-10-02
 **/

class Db{
    protected $dbEnv = null;
    public $dbConnection = null;

    /**
     * Load and initialize the connection with the database using environnement variable.
     */
    public function __construct($envPath = '/.env.json'){
        $json = file_get_contents(dirname(__DIR__, 1).$envPath);

        $tmpEnv = json_decode($json,true);        
        $this->dbEnv = $tmpEnv["db"];

        if(empty($dbConnection)){
            $dsn = 'mysql:host=' . $this->dbEnv["host"].':'.$this->dbEnv["port"].';dbname='.$this->dbEnv["name"];

            $this->dbConnection = new PDO($dsn,$this->dbEnv["login"]["username"],$this->dbEnv["login"]["password"]);
        }
    }

    /**
     * This function try to select an entry in the database
     * @param string $req 
     * @param array $values
     * @return array $entry
     */
    public function selectOneRecord($req,$values = null){

        $sth = $this->dbConnection->prepare($req);

        $sth->execute($values);

        $data = $sth->fetch();
        return $data;
    }
}