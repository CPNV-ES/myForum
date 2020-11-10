<?php
session_start();

require_once "controller/ReferenceController.php";
require_once "controller/RoleController.php";
require_once "controller/StateController.php";
require_once "controller/ThemeController.php";
require_once "controller/OpinionsController.php";
require_once "view/helpers/ViewHelpers.php";

$controller = isset($_GET['controller']) ? $_GET['controller'] . "Controller" : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (empty($controller) || empty($action)) {
    require_once "view/homepage.view.php";
} else {
    if (class_exists($controller)) {
        $ctr = new $controller();
        if (method_exists($ctr, $action)) {
            if ($id) {
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