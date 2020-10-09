<?php
/**
 * File : modelRoleTest.php
 * Author : X. Carrel
 * Created : 2020-10-01
 * Modified last :
 **/
require_once ("../Role.php");
require_once("../Db.php");
// Create a new role
echo "Test of save(): ";
$role = new Role();
$role->name = "testing";

$role->save(); // The method we test here: save the new value to the db

$readback = selectOneRecord("select * from roles where name=:name", ["name" => "testing"]); // function from Db.php
if ($readback["name"] == "testing" && $readback["id"] > 0) {
    echo "success\n";
} else {
    die ("fail\n");
}

$testid = $readback["id"]; // save for later

// Read a role
echo "Test of load(): ";
$loadedRole = new Role();
$loadedRole->id = $testid;
$loadedRole->load(); // The method we test here: load the object's attribute from the db
if ($loadedRole->name == "testing") {
    echo "success\n";
} else {
    die ("fail\n");
}

// Change a role
echo "Test of update(): ";
$loadedRole->name = "tested";
$loadedRole->update(); // The method we test here: update the object's attribute in the db
$verify = new Role();
$verify->id = $testid;
$verify->load(); // read back from db
if ($verify->name == "tested") {
    echo "success\n";
} else {
    die ("fail\n");
}

// Delete a role
echo "Test of delete(): ";
$loadedRole->delete(); // The method we test here: update the object's attribute in the db
$verify = new Role();
$verify->id = $testid;
$verify->load(); // try to read back from db
if ($verify->id == null) {
    echo "success\n";
} else {
    die ("fail\n");
}

