<?php

require_once("model/Role.php");

class RoleController
{
    public function index()
    {
        $roles = Role::all();
        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/index.view.php";
    }

    public function show($id)
    {
        $role = new Role();
        $role->id = $id;
        $role->load();
        
        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/show.view.php";
    }

    public function create() // simply show the creation form
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/create.view.php";
    }

    public function store() // handle form creation submit
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/show.view.php"; // back to show after storing new resource
    }

    public function edit($id) // simply show the edit form
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/update.view.php";
    }

    public function update($id) // handle edit form submit
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/show.view.php"; // back to show after saving changes
    }

    public function destroy($id)
    {
        require_once $_SERVER['DOCUMENT_ROOT']."/view/roles/index.view.php"; // back to index after destroy
    }
}
