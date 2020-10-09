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

        $stmt->execute($data);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function insertOneRecord($query, $data)
    {
        $stmt = $this->dbh->prepare($query);

        $result = $stmt->execute($data);

        if ($result = true)
        {
            return $this->dbh->lastInsertId();
        }
        return false;
    }

    function updateOneRecord($query, $data)
    {
        $stmt = $this->dbh->prepare($query);

        $result = $stmt->execute($data);

        return $result;
    }

    function deleteOneRecord($query, $data)
    {
        $stmt = $this->dbh->prepare($query);

        $result = $stmt->execute($data);

        return $result;
    }

}


?>
