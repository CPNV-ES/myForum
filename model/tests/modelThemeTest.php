<?php
/**
 * File : modelThemeTest.php
 * Author : X. Carrel
 * Created : 2020-10-01
 * Modified last :
 **/
require_once ("../Theme.php");
require_once("../Db.php");
// Create a new theme
echo "Test of save(): ";
$theme = new Theme();
$theme->name = "testing";

$theme->save(); // The method we test here: save the new value to the db

$db = new Db();
$readback = $db->selectOneRecord("select * from themes where name=:name", ["name" => "testing"]); // function from Db.php
if ($readback["name"] == "testing" && $theme->id > 0) {
    echo "success\n";
} else {
    die ("fail\n");
}

$testid = $readback["id"]; // save for later

// Read a theme
echo "Test of load(): ";
$loadedTheme = new Theme();
$loadedTheme->id = $testid;
$loadedTheme->load(); // The method we test here: load the object's attribute from the db
if ($loadedTheme->name == "testing") {
    echo "success\n";
} else {
    die ("fail\n");
}

// Change a theme
echo "Test of update(): ";
$loadedTheme->name = "tested";
$loadedTheme->update(); // The method we test here: update the object's attribute in the db
$verify = new Theme();
$verify->id = $testid;
$verify->load(); // read back from db
if ($verify->name == "tested") {
    echo "success\n";
} else {
    die ("fail\n");
}

// Delete a theme
echo "Test of delete(): ";
$loadedTheme->delete(); // The method we test here: update the object's attribute in the db
$verify = new Theme();
$verify->id = $testid;
$verify->load(); // try to read back from db
if ($verify->id == null) {
    echo "success\n";
} else {
    die ("fail\n");
}

