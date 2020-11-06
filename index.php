<?php
session_start();

require_once "controller/ReferenceController.php";
require_once "controller/RoleController.php";
require_once "controller/StateController.php";
require_once "controller/ThemeController.php";

$controller = $_GET['controller'] . "Controller";
$action = $_GET['action'];
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
}
if (empty($controller) || empty($action)) {
    require_once "view/homepage.view.php";
} else {
    if (class_exists($controller)) {
        $ctr = new $controller();
        if (method_exists($ctr, $action)) {
            if (isset($id)) {
                $ctr->$action($id);
            } else {
                $ctr->$action();
            }
        } else {
            require_once "view/errors/404.view.php";
        }
    } else {
        require_once "view/errors/404.view.php";
    }
}
?>


