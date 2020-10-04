<?php
/**
 * File : db.php
 * Author : D. Ramos
 * Created : 2020-10-02
 * Modified last :
 **/

class db
{
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost; dbname=myforum', 'root', '');
    }

    public function selectOneRecord($request, $bindings)
    {
        $statement = $this->connection->prepare($request);

        foreach($bindings as $placeholder => $bound)
        {
            $statement->bindParam($placeholder, $bound);
        }

        $statement->execute();
        $data = $statement->fetch();

        return $data;
    }

    public function insertOneRecord($request, $bindings)
    {
        $statement = $this->connection->prepare($request);

        foreach($bindings as $placeholder => $bound)
        {
            $statement->bindParam($placeholder, $bound);
        }

        $statement->execute();
    }
}