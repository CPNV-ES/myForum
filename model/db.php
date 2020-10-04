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
        $file = "db.ini";

        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');

        $dsn = $settings['database']['driver'] . ':host=' . $settings['database']['host'] . ';dbname=' . $settings['database']['schema'];

        $this->connection = new PDO($dsn, $settings['database']['username'], $settings['database']['password']);
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