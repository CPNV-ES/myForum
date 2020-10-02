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


function selectOneRecord($req, $values)
{

    $connect = getDB();

    $result = $connect->prepare($req);

    foreach ($values as $key => $value){
        $result->bindParam(":".$key, $value);
    }

    $result->execute();

    return $result->fetch();
}

function ExecReq($req){

    $connect = getDB();

    $result = $connect->query($req);


}

function ReturnExecReq($req){

    $connect = getDB();

    $result = $connect->query($req);

    return $result->fetch();

}