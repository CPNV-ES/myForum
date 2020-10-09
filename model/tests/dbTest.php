<?php
require_once ("../db.php");


$query = "select * from myforum.references where description = :desc";
$values = ["desc" => "Scrum guide"];

$db = new DataBase();

$db->selectOneRecord($query, $values);



?>