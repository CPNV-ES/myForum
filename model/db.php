<?php
/**
 * File : db.php
 * Author : D. Ramos
 * Created : 2020-10-02
 * Modified last :
 **/

function databaseConnection() {
    $connection = new PDO('mysql:host=localhost; dbname=myforum', 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $connection;
}

function selectOneRecord($request) {
    $connection = databaseConnection();
    $data = $connection->query($request);

    return $data;
}

function insertOneRecord($request) {
    $connection = databaseConnection();
    $connection->exec($request);
}