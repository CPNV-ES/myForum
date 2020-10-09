<?php
/**
 * File : modelStateTest.php
 * Author : X. Carrel
 * Created : 2020-10-01
 * Modified last :
 **/
require_once ("../State.php");
require_once ("../db.php");
// Create a new state
echo "Test of save(): ";
$state = new State();
$state->name = "testing";

$state->save(); // The method we test here: save the new value to the db

$readback = selectOneRecord("select * from states where name=:name", ["name" => "testing"]); // function from db.php
if ($readback["name"] == "testing" && $state->id > 0) {
    echo "success\n";
} else {
    die ("fail\n");
}

$testid = $readback["id"]; // save for later

// Read a state
echo "Test of load(): ";
$loadedState = new State();
$loadedState->id = $testid;
$loadedState->load(); // The method we test here: load the object's attribute from the db
if ($loadedState->name == "testing") {
    echo "success\n";
} else {
    die ("fail\n");
}

// Change a state
echo "Test of update(): ";
$loadedState->name = "tested";
$loadedState->update(); // The method we test here: update the object's attribute in the db
$verify = new State();
$verify->id = $testid;
$verify->load(); // read back from db
if ($verify->name == "tested") {
    echo "success\n";
} else {
    die ("fail\n");
}

// Delete a state
echo "Test of delete(): ";
$loadedState->delete(); // The method we test here: update the object's attribute in the db
$verify = new State();
$verify->id = $testid;
$verify->load(); // try to read back from db
if ($verify->id == null) {
    echo "success\n";
} else {
    die ("fail\n");
}

