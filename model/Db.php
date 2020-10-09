<?php

class Db {
    private static $instance;
    private $dbConnection;

    private function __construct() {
        $creds = (require("../myForum.credentials.php"))["mysql"];
        $this->dbConnection = new PDO("mysql:host={$creds['host']};dbname={$creds['dbname']}", $creds["username"], $creds["passwd"]);
    }

    /**
     * Gets the current instance of Db
     * @return Db The current instance
     */
    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new Db();
        }
        return self::$instance;
    }

    /**
     * Returns the current open PDO connection to the database
     * @return PDO The PDO connection
     */
    public static function getDbConnection() {
        return self::getInstance()->dbConnection;
    }

    /**
     * Executes the specified query with the specified parameters and returns the first row
     * @param $query The SQL statement
     * @param $params An array in which the keys are the parameter name and the value the parameter value
     * @return mixed An array containing the selected rows, or false on error
     */
    public static function selectOneRecord($query, $params) {
        $stmt = self::getInstance()->getDbConnection()->prepare($query);
        foreach($params as $paramName => $paramVal) {
            $stmt->bindParam(":" . $paramName, $paramVal);
        }
        $stmt->execute();
        return $stmt->fetch();
    }
}