<?php

class Db {
    private static $instance;
    private $dbConnection;

    private function __construct() {
        $creds = (require(dirname(__DIR__)."/myForum.credentials.php"))["mysql"];
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

    private static function select($query, $params, $multirecord, $classname = null)
    {
        $dbh = self::getDbConnection();
        try
        {
            $statement = $dbh->prepare($query);//prepare query
            $statement->execute($params);//execute query
            if ($multirecord)
            {
                if(isset($classname)){
                    $statement->setFetchMode(PDO::FETCH_CLASS,$classname);
                }
                else{
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                }

                $queryResult = $statement->fetchAll();

            } else
            {
                if(isset($classname)){
                    $statement->setFetchMode(PDO::FETCH_CLASS,$classname);
                }
                else{
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                }

                $queryResult = $statement->fetch();

            }
            return $queryResult;
        } catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            return null;
        }
    }

    public static function selectOneRecord($query, $params, $classname = null)
    {
        return self::select($query, $params, false, $classname);
    }

    public static function selectMany($query, $params, $classname = null)
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
