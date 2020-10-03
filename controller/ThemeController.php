<?php


class ThemeController
{
    public function index()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/index.view.php";
    }

    public function show()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/show.view.php";
    }

    public function create()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/create.view.php";
    }

    public function store()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/show.view.php"; // back to show after storing new resource
    }

    public function edit()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/update.view.php";
    }

    public function update()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/show.view.php"; // back to show after saving changes
    }

    public function destroy()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/themes/index.view.php"; // back to index after destroy
    }
}
