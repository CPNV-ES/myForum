<?php

/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE
 * Date: 02/10/2020
 */

function getDB()
{
    $connexion = new PDO('mysql:host=localhost; dbname=exercicelooper');

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $connexion;
}



function selectOneRecord($req){

    $connect = getBD();

    $result = $connect->query($req);

    return $result;
}
