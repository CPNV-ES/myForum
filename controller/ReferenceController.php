<?php


class ReferenceController
{
    public function index()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/index.view.php";
    }

    public function show()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/show.view.php";
    }

    public function create()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/create.view.php";
    }

    public function store()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/show.view.php"; // back to show after storing new resource
    }

    public function edit()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/update.view.php";
    }

    public function update()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/show.view.php"; // back to show after saving changes
    }

    public function destroy()
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/references/index.view.php"; // back to index after destroy
    }
}
