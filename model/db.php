<?php
/**
 * File : db.php
 * Author : D. Ramos
 * Created : 2020-10-02
 * Modified last : 2020-10-09
 **/

/**
 * Class db
 * This class is used to deal with the database
 */
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

    /**
     * This method is used to select data from the database
     * @param $request
     * @param $bindings
     * @return mixed
     */
    public function selectOneRecord($request, $bindings)
    {
        $statement = $this->connection->prepare($request);

        $statement->execute($bindings);
        $data = $statement->fetch();

        return $data;
    }

    /**
     * This method is used to insert data into the database
     * @param $request
     * @param $bindings
     */
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

    /**
     * This method is used to update data from the database
     * @param $request
     * @param $bindings
     */
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

    /**
     * This method is used to delete data from the database
     * @param $request
     * @param $bindings
     */
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