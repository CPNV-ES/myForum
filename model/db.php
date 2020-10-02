<?php 
/**
 * File : db.php
 * Author : A. Quentin
 * Created : 2020-10-02
 * Modified last : 2020-10-02
 **/

$dbEnv = null;
$dbConnection = null;

/**
 * Load and initialize database environment variable
 */
function dbEnvInit($envPath = '../env.json'){
    $json = file_get_contents($envPath);

    $dbEnv = json_decode($json)["db"];
    var_dump($dbEnv);
}

/**
 * Initialize the connection with the database using environnement variable
 */
function initDbConnection(){
    if(empty($dbConnection)){
        $dsn = 'mysql:host=' . $dbEnv["host"].';dbname='.$dbEnv["name"];

        $dbConnection = new PDO($dsn,$dbEnv["login"]["username"],$dbEnv["login"]["password"]);
    }    
}


/**
 * This function try to select an entry in the database
 * @param string $req 
 * @param array $values
 * @return array $entry
 */
function selectOneRecord($req,$values = null){
    
}