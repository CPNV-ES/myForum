<?php
/**
 * File : modelReferenceTest.php
 * Author : X. Carrel
 * Created : 2020-10-01
 * Contributor : M. Burnat
 * Modified last : 2020-10-02
 **/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../Moderation.php");


//Test of displaying content

//get datas from db
$opinions = Moderation::all();
print_r($opinions);

?>

