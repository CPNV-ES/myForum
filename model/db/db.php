<?php
 
class Db{

    private static function connectToDb(){
        $ini_array = parse_ini_file("dbconfig.ini");
        $dsn= "mysql:host=$ini_array[host];dbname=$ini_array[dbname]";
        $conn = new PDO($dsn, $ini_array['user'], $ini_array['password']);
        return $conn;
    }

    public static function  Insert($query, $params)
    {
        $conn = self::connectToDb();
        $prepare = $conn->prepare($query);
        $prepare->execute($params);
        return $conn->lastInsertId();
    }

    public static function  Update($query)
    {
        $conn = self::connectToDb();
        $prepare = $conn->prepare($query);
        $prepare->execute();
    }

    public static function  Delete($query)
    {
        $conn = self::connectToDb();
        $prepare = $conn->prepare($query);
        $prepare->execute();
    }

    public static function selectOneRecord($query){
        $conn =  self::connectToDb();
        $prepare = $conn->prepare($query);
        $prepare->execute();
        return $prepare->fetch();
    }
}
 
