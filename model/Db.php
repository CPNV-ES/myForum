<?php

/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE
 * Date: 02/10/2020
 */

    private function __construct() {
        $creds = (require(".credentials.php"))["mysql"];
        $this->dbConnection = new PDO("mysql:host={$creds['host']};dbname={$creds['dbname']};charset=utf8", $creds["username"], $creds["passwd"]);
    }

function getDB()
{
    $config = new config();

    $connect = new PDO($config -> GetDSN(), $config -> GetUser(), $config -> GetPass());

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
                $statement->setFetchMode( PDO::FETCH_CLASS, $classname);
                $queryResult = $statement->fetch(PDO::FETCH_CLASS);
            }
            return $queryResult;
        } catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            return null;
        }
    }

    public static function selectOne($query, $params)
    {
        return self::select($query, $params, false);
    }

    public static function selectMany($query, $params)
    {
        return self::select($query, $params, true);
    }

function selectOneRecord($req, $values)
{

    $connect = getDB();

    $result = $connect->prepare($req);

    foreach ($values as $key => $value){
        $result->bindParam(":".$key, $value);
    }

    $result->execute();

    return $result->fetch();
}
