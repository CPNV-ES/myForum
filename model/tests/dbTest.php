<?php
require_once ("../db.php");


$query = "select * from myforum.references where description = :desc";
$values = ["desc" => "Scrum guide"];

$db = new DataBase();
$datas = $db->selectOneRecord($query, $values
var_dump($datas);





$db->insertOneRecord($query, $values);



?>