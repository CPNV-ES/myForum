<?php

class Db {
    private static $instance;
    private $dbConnection;

    private function __construct() {
        $creds = (require("myForum.credentials.php"))["mysql"];
        $this->dbConnection = new PDO("mysql:host={$creds['host']};dbname={$creds['dbname']}", $creds["username"], $creds["passwd"]);
        $this->dbConnection->exec('set names utf8');
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

    private static function select($query, $params, $multirecord, $classname)
    {
        $dbh = self::getDbConnection();
        try
        {
            $statement = $dbh->prepare($query);//prepare query
            $statement->execute($params);//execute query
            if ($multirecord)
            {
                $queryResult = $statement->fetchAll(PDO::FETCH_CLASS, $classname);
            } else
            {
                $queryResult = $statement->fetch(PDO::FETCH_CLASS, $classname);
            }
            return $queryResult;
        } catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            return null;
        }
    }

    public static function selectOne($query, $params, $classname)
    {
        return self::select($query, $params, false, $classname);
    }

    public static function selectMany($query, $params, $classname)
    {
        return self::select($query, $params, true, $classname);
    }

    public static function insert($query, $params)
    {
        $dbh = self::getDbConnection();
        try
        {
            $statement = $dbh->prepare($query);//prepare query
            $statement->execute($params);//execute query
            return $dbh->lastInsertId();
        } catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            return null;
        }
    }

    public static function execute($query, $params)
    {
        $dbh = self::getDbConnection();
        try
        {
            $statement = $dbh->prepare($query);//prepare query
            $statement->execute($params);//execute query
            return true;
        } catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            return null;
        }
    }
}
