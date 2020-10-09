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

        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function selectOneRecord($request, $bindings)
    {
        $statement = $this->connection->prepare($request);

        $statement->execute($bindings);
        $data = $statement->fetch();

        return $data;
    }

    public function insertOneRecord($request, $bindings)
    {
        $statement = $this->connection->prepare($request);

        try
        {
            $statement->execute($bindings);
        }
        catch (PDOException $exception)
        {
            echo $exception->getMessage();
        }
    }

    public function updateOneRecord($request, $bindings)
    {
        $statement = $this->connection->prepare($request);

        try
        {
            $statement->execute($bindings);
        }
        catch (PDOException $exception)
        {
            echo $exception->getMessage();
        }
    }

    public function deleteOneRecord($request, $bindings)
    {
        $statement = $this->connection->prepare($request);

        try
        {
            $statement->execute($bindings);
        }
        catch (PDOException $exception)
        {
            echo $exception->getMessage();
        }
    }
}