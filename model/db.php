<?php 

$dbEnv = null;

/**
 * Load and initialize database environment variable
 */
function dbEnvInit($envPath = '../env.json'){
    $json = file_get_contents($envPath);

    $dbEnv = json_decode($json)["db"];
}

/**
 * This function try to select an entry in the database
 * @param string $req 
 * @param array $values
 * @return array $entry
 */
function selectOneRecord($req,$values = null){

}