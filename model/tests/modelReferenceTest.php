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

require_once ("../Reference.php");
require_once ("../db.php");

$db = new DataBase();
// Create a new reference
echo "Test of save(): ";
$reference = new Reference();
$reference->name = "testing";

$reference->save(); // The method we test here: save the new value to the db

$readback = $db -> selectOneRecord("select * from myforum.references where description=:desc", ["desc" => "Scrum guide"]); // function from db.php
echo("readback :" . $readback);
//if ($readback["id"] > 0) {
if ($readback == "1") {
    echo "success\n";
} else {
    die ("fail\n");
}

/*
$testid = $readback["id"]; // save for later

// Read a reference
echo "Test of load(): ";
$loadedReference = new Reference();
$loadedReference->id = $testid;
$loadedReference->load(); // The method we test here: load the object's attribute from the db
if ($loadedReference->name == "testing") {
    echo "success\n";
} else {
    die ("fail\n");
}

// Change a reference
echo "Test of update(): ";
$loadedReference->name = "tested";
$loadedReference->update(); // The method we test here: update the object's attribute in the db
$verify = new Reference();
$verify->id = $testid;
$verify->load(); // read back from db
if ($verify->name == "tested") {
    echo "success\n";
} else {
    die ("fail\n");
}

// Delete a reference
echo "Test of delete(): ";
$loadedReference->delete(); // The method we test here: update the object's attribute in the db
$verify = new Reference();
$verify->id = $testid;
$verify->load(); // try to read back from db
if ($verify->id == null) {
    echo "success\n";
} else {
    die ("fail\n");
}*/

?>

