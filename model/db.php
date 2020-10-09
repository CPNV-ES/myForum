<?php

/**
*
*/
class db
{

    private $dbh;

    /**
    * Connec to db
    */
    function __construct()
    {
        $config = parse_ini_file('../../config.ini');
        $host = $config['host'];
        $db = $config['db'];
        $user = $config['user'];
        $pass = $config['pass'];

        $this->dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    }


    function selectOneRecord($query, $data)
    {
        $stmt = $this->dbh->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindParam(":" . $key, $value);
        }

        return $stmt->execute();
    }

    function newReference($data)
    {
        $stmt = $this->dbh->prepare("INSERT INTO `references` (`description`, `url`) VALUES (:description, :url)");
        foreach ($data as $key => $value) {
            $stmt->bindParam(":" . $key, $value);
        }

        $stmt->execute();
    }

}


?>
