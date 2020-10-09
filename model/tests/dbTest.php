<?php
require_once ("../db.php");


$query = "select * from myforum.references where description = :desc";
$values = ["desc" => "Scrum guide"];

$db = new DataBase();
$datas = $db::selectOneRecord($query, $values);
var_dump($datas);



echo("====================================== \n");

$query = "insert into myforum.references ('description', 'url') values (:desc, :url);";
$values = ["desc" => "This is a test"];
array_push($values, ["url" => "www.test.ch"]);

$db->insertOneRecord($query, $values);



?>