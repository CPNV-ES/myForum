<?php
/**
 * File : modelReferenceTest.php
 * Author : X. Carrel
 * Created : 2020-10-01
 * Modified last :
 **/
require_once ("../Reference.php");
require_once ("../db.php");
// Create a new reference
echo "Test of save(): ";
$reference = new Reference();

echo $reference->description;
// Create a new db
$db = new db();

$reference->save(); // The method we test here: save the new value to the db

$readback = $db->selectOneRecord("select * from `references` where description=:description", ["description" => "testing"]); // function from db.php
if ($readback["description"] == "testing" && $readback["id"] > 0) {
    echo "success\n";
} else {
    die ("fail\n");
}

$testid = $readback["id"]; // save for later

// Read a reference
echo "Test of load(): ";
$loadedReference = new Reference();
$loadedReference->id = $testid;
$loadedReference->load(); // The method we test here: load the object's attribute from the db
if ($loadedReference->description == "testing") {
    echo "success\n";
} else {
    die ("fail\n");
}

// Change a reference
echo "Test of update(): ";
$loadedReference->description = "tested";
$loadedReference->update(); // The method we test here: update the object's attribute in the db
$verify = new Reference();
$verify->id = $testid;
$verify->load(); // read back from db
if ($verify->description == "tested") {
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
}
