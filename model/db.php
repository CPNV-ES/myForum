<?php

/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE
 * Date: 02/10/2020
 */

require_once "config.php";

function getDB()
{
    $config = new config();

    $connect = new PDO($config->GetDSN(), $config -> GetUser(), $config -> GetPass());

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $connect;
}


function selectOneRecord($req)
{

    $connect = getDB();

    $result = $connect->prepare($req);

    $result->execute();

    return $result->fetch();
}

function execReq($req){

    $connect = getDB();

    $result = $connect->query($req);

    return $result;

}