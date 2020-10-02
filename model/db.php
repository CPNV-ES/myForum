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

    public function selectOneRecord($request, $array)
    {
        $statement = $this->connection->prepare($request);

        foreach($array as $key => $value)
        {
            $v = $value;
        }

        $statement->execute($v);
        $data = $statement->fetch();

        return $data;
    }

    public function insertOneRecord($request)
    {
        $this->connection->exec($request);
    }
}